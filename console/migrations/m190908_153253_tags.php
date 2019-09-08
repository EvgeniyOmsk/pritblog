<?php

use yii\db\Migration;

/**
 * Class m190908_153253_tags
 */
class m190908_153253_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tags}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'frequency' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%blog_has_tags}}', [
            'blog_id' => $this->integer()->notNull()->unsigned(),
            'tag_id' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190908_153253_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190908_153253_tags cannot be reverted.\n";

        return false;
    }
    */
}
