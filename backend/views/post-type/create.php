<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PostType */

$this->title = 'Create Post Type';
$this->params['breadcrumbs'][] = ['label' => 'Post Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
