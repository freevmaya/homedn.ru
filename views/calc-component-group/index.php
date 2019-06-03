<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Группы элементов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-component-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
//            'id',
            'name',
//            'sort',
            'image_order',
//            'size_element',
            //'calc_room_id',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
