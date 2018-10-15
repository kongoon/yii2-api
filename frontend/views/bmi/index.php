<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 13/10/18
 * Time: 10:06
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'BMI Check';
?>

<?php $form = ActiveForm::begin()?>

<?=$form->errorSummary($model)?>

<div class="row">
    <div class="col-md-3">
        <?=$form->field($model, 'height')?>
    </div>
</div>




<?=$form->field($model, 'weight')?>

<?=Html::submitButton('Calculate', ['class' => 'btn btn-warning'])?>

<?php ActiveForm::end()?>

<?=$bmi?>