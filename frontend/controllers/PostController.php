<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 13/10/18
 * Time: 11:41
 */

namespace frontend\controllers;
use common\models\Post;
use yii\web\Controller;
use common\models\PostOld;
use yii\data\ActiveDataProvider;
use Yii;
use yii\web\NotFoundHttpException;
use frontend\models\PostSearch;

class PostController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }



    public function actionView(int $id)
    {
        return $this->render('view', [
            'model' => $this->loadModel($id)
        ]);
    }

    public function actionViewAjax($id)
    {
        return $this->renderAjax('view-ajax', [
            'model' => $this->loadModel($id)
        ]);
    }



    protected function loadModel($id)
    {
        $model = Post::findOne($id);
        if(!$model){
            throw new NotFoundHttpException('Not found');
        }
        return $model;
    }
}