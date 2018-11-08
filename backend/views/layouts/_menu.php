<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 14/10/18
 * Time: 11:05
 */

use yii\bootstrap\Nav;

$menu = [
    ['label' => 'Home', 'url' => ['/site/index']]
];
if (Yii::$app->user->can('admin')) {
    $menu[] = ['label' => 'Post Type', 'url' => ['/post-type/index']];
    $menu[] = ['label' => 'Post', 'url' => ['/post/index']];
    $menu[] = ['label' => 'User', 'url' => ['/administrator/user/index']];
    $menu[] = ['label' => 'Admin', 'url' => ['/admin'], 'items' => [
        ['label' => 'Assignment', 'url' => ['/admin/assignment']],
        ['label' => 'Role', 'url' => ['/admin/role']],
        ['label' => 'Permission', 'url' => ['/admin/permission']],
        ['label' => 'Route', 'url' => ['/admin/route']]
    ]];
}


if (Yii::$app->user->can('other')) {


}
?>
<?= Nav::widget([
    'options' => ['class' => 'nav-pills nav-stacked'],
    'items' => $menu,
]) ?>
