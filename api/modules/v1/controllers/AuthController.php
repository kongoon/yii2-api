<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 8/11/2018 AD
 * Time: 12:48
 */

namespace api\modules\v1\controllers;


use api\components\Controller;
use Yii;
class AuthController extends Controller
{
    public function actionMe()
    {
        $user = Yii::$app->user->identity;
        /* remove token */
        unset($user['token']);
        return $this->apiItem($user);
    }
}