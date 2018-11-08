<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['docs', 'index'],
                'formats' => [
                    'application/json' => Response::FORMAT_HTML,
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return "<h2 style='text-align: center;'>Welcome</h2>";
    }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDocs()
    {
        return $this->render('docs');
    }
    public function actionResource()
    {
        $swagger = \Swagger\scan(['../config', '../routes', '../models', '../modules']);
        return $swagger;
    }
}