<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 13/10/18
 * Time: 09:59
 */

namespace frontend\controllers;
use yii\web\Controller;
use common\models\Bmi;
use Yii;

class BmiController extends Controller
{
    public function actionIndex()
    {
        $bmi = null;
        $model = new Bmi();
        if($model->load(Yii::$app->request->post())){

            $bmi = $model->weight / ($model->height * $model->height);

        }
        return $this->render('index', [
            'model' => $model,
            'bmi' => $bmi
        ]);
    }
}