<?php
namespace main\modules\backend\controllers;

use common\models\Blog;
use common\models\Tags;
use http\Exception\BadMessageException;
use phpDocumentor\Reflection\DocBlock\Tag;
use Symfony\Component\Yaml\Tests\B;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class BlogController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@backend/views/site/error.php'
            ],
        ];
    }

    /**
     * Displays list blogs.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $tags  = Tags::find()->all();

        return $this->render('index', ['dataProvider' => $dataProvider, 'tags' => $tags]);
    }

    /**
     * Update page.
     *
     * @return string
     */
    public function actionUpdate($id = null)
    {
        $model = ($id)? Blog::findOne($id) : new Blog();
        $statusesItems = [0 => Blog::STATUS_HIDDEN, 1 => Blog::STATUS_SHOW];

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', 'Created');
                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', current($model->firstErrors));
            }
        }

        return $this->render('update', ['model' => $model, 'statusesItems' => $statusesItems]);
    }

    /**
     * Delete page.
     *
     * @param $id
     * @return string|\yii\web\Response
     * @throws Exception
     */
    public function actionDelete($id)
    {
        $model = Blog::findOne($id);

        if (!$model) {
            throw new Exception('Not found blog by id = ' . $id);
        }

        if (!$model->delete()) {
            throw new Exception('Can\'t delete blog by id = ' . $id);
        }

        Yii::$app->session->setFlash('success', 'Deleted');
        return $this->redirect('index');
    }
}
