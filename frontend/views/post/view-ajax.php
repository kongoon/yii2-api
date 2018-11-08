<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 13/10/18
 * Time: 15:35
 */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($model->name);
?>
<h1><?=$this->title?></h1>
<?=Yii::$app->formatter->asDatetime($model->created_at)?>

<?=HtmlPurifier::process($model->description)?>

