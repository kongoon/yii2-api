<?php

/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 15/10/18
 * Time: 12:50
 */

/* @var $this \yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Ajax';
?>

<?=Html::a('Load', '#', ['class' => 'btn btn-success btn-load'])?>
    <div class="content"></div>
    <div class="content"></div>


<?php $this->registerJs('
$(".btn-load").click(function(e){
    //Ajax
    $.get(
        "'.Url::to(['/post/view-ajax']).'",//url
        {
            id: 1// param
        },
        function(data){
            $(".content").html(data);
        }
    );
});
')?>