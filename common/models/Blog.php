<?php
namespace common\models;

use dosamigos\taggable\Taggable;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Blog extends ActiveRecord
{
    const STATUS_HIDDEN = 0;
    const STATUS_SHOW = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            Taggable::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['title', 'string', 'min' => 3, 'max' => 255],

            ['description', 'string', 'min' => 10],

            [['title', 'description'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],

            ['status', 'default', 'value' => self::STATUS_HIDDEN],
            ['status', 'in', 'range' => [self::STATUS_HIDDEN, self::STATUS_SHOW]],

            [['status', 'created_at', 'updated_at'], 'safe'],

            [['tagNames'], 'safe'],
        ];
    }

    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'tag_id'])->viaTable(BlogHasTags::tableName(), ['blog_id' => 'id']);
    }
}
