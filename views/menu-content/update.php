<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MenuContent */

$this->title                   = 'Изменить ' . $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Меню', 'url' => [ '/menu/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->menu->name, 'url' => [ '/menu/update', 'id' => $model->menu_id ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Состав меню', 'url' => [ 'index', 'menu_id' => $model->menu_id ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="menu-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'  => $model,
        'page'   => $page,
        'parent' => $parent,
    ])
    ?>

</div>
