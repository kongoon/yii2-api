<?php

/* @var $this yii\web\View */
use dosamigos\chartjs\ChartJs;
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>


<?= ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'height' => 200,
        'width' => 400
    ],
    'data' => [
        'labels' => $chart_type,
        'datasets' => $chart_sets
    ]
]);
?>

<?=GridView::widget([
    'dataProvider' => $dataProvider
])?>
