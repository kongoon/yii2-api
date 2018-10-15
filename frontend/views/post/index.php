<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 13/10/18
 * Time: 11:45
 */
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;

$this->title = 'Post';
?>

<div class="row">
    <?=ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'itemView' => '_post'
    ])?>
</div>
