<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MenuContent */

$this->title                   = $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Меню', 'url' => [ '/menu/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->menu->name, 'url' => [ '/menu/update', 'id' => $model->menu_id ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Состав меню', 'url' => [ 'index', 'menu_id' => $model->menu_id ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', [ 'update', 'id' => $model->id, 'menu_id' => $model->menu_id ], [ 'class' => 'btn btn-primary' ]) ?>
        <?=
        Html::a('Удалить', [ 'delete', 'id' => $model->id ], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Удалить?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'menu_id',
            'name',
            'url:url',
            'page_id',
            'sort',
            'menu_content_id',
        ],
    ])
    ?>

</div>
