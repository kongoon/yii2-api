<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 14/10/18
 * Time: 18:54
 */

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;

class PostController extends ActiveController
{
    public $modelClass = 'common\models\Post';
}