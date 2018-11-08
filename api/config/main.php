<?php

/**
 * @SWG\Swagger(
 *   info={
 *     "title"="REST API",
 *     "version"="0.0.1"
 *   },
 *   host=API_HOST,
 *   basePath="/api"
 * )
 *
 * @SWG\SecurityScheme(
 *   securityDefinition="jwt",
 *   description="add 'Bearer ' before jwt token",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization"
 * )
 */

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
);

use \yii\web\Request;
//$baseUrl = str_replace('/api/web', '/api/', (new Request)->getBaseUrl());
//echo $baseUrl;
$rules = require(__DIR__ . '/rules.php');

return [
    'id' => 'app-api',
    'timeZone' => 'Asia/Bangkok',
    'basePath' => dirname(__DIR__),    
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [   
        'request' => [
            //'baseUrl' => $baseUrl,
            /* Enable JSON Input: */
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'response' => [
            /* Enable JSON Output: */
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && is_array($response->data)) {
                    /* delete code param */
                    if (array_key_exists('code', $response->data)) {
                        unset($response->data['code']);
                    }
                    /* change status to statusCode */
                    if (array_key_exists('status', $response->data)) {
                        $response->data['statusCode'] = $response->data['status'];
                        unset($response->data['status']);
                    }
                }
            },
        ],
        'user' => [
            'identityClass' => 'api\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'docs' => 'site/docs',
                [
                    'pattern' => 'resource',
                    'route' => 'site/resource',
                    'suffix' => '.json'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'pluralize' => false,
                    'prefix' => 'api',
                    'controller' => ['v1'],
                    'extraPatterns' => $rules,
                ],
            ],
        ],
//        'urlManager' => [
//            //'baseUrl' => $baseUrl,
//            'enablePrettyUrl' => true,
//            'enableStrictParsing' => false,
//            'showScriptName' => false,
//            'rules' => [
//                ['class' => 'yii\rest\UrlRule', 'controller' => 'v1/post'],
//            ],
//        ],
    ],
    'params' => $params,
];





