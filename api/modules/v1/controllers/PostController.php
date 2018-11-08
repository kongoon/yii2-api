<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 14/10/18
 * Time: 18:54
 */

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;
use yii\web\Response;

use api\components\Controller;
use common\models\Post;
use yii\web\NotFoundHttpException;
use Yii;

class PostController extends Controller
{
    public function actionIndex()
    {
        $news = Post::find()
            ->orderBy('id')
            ->all();
        return $this->apiCollection($news);
    }

    public function actionCreate()
    {
        $dataRequest['Post'] = Yii::$app->request->getBodyParams();
        $model = new Post();
        throw new NotFoundHttpException('Resource not found');
        if ($model->load($dataRequest) && $model->save()) {
            return $this->apiCreated($model);
        }
        return $this->apiValidate($model->errors);
    }

    public function actionUpdate($id)
    {
        $dataRequest['Post'] = Yii::$app->request->getBodyParams();
        $model = $this->findModel($id);
        if ($model->load($dataRequest) && $model->save()) {
            return $this->apiUpdated($model);
        }
        return $this->apiValidate($model->errors);
    }

    public function actionView($id)
    {
        return $this->apiItem($this->findModel($id));
    }

    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            return $this->apiDeleted(true);
        }
        return $this->apiDeleted(false);
    }

    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Resource not found');
        }
    }
}