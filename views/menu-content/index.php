<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Состав меню';
$this->params['breadcrumbs'][] = [ 'label' => 'Меню', 'url' => [ '/menu/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $menu_item->name, 'url' => [ '/menu/update', 'id' => $menu_id ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-content-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', [ 'create', 'menu_id' => $menu_id ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
//            'id',
//            'menu.name',
            'name',
            'url',
//            'page_id',
            //'sort',
            //'menu_content_id',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
