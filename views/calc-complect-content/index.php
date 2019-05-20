<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Элементы в комплекте';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-complect-content-index">

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
//            'description',
//            'image',
//            'sort',
            //'mandatory',
            'price',
            //'countable',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
