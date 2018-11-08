<?php
use yii\helpers\Html;
?>
<div class="col-md-3">
    <?=Html::img('https://via.placeholder.com/300x350', ['class' => 'img-responsive'])?>
    <h3><?=$model->name?></h3>
    <?=Yii::$app->formatter->asDatetime($model->created_at)?>
    <?=Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-info', 'title' => $model->name])?>
</div>
