<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\PostType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'description:ntext',
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->createdBy->username;
                }
            ],
            'created_at:datetime',
            //'updated_by',
            //'updated_at',
            [
                'attribute' => 'post_type_id',
                'filter' => ArrayHelper::map(PostType::find()->all(), 'id', 'name'),
                'value' => function ($model) {
                    return $model->postType->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
