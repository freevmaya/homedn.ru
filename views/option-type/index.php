<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Типы данных - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = 'Типы данных';
?>
<div class="option-type-index">

    <h1>Типы данных</h1>

    <p>
        <?= Html::a('Новый', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'id',
            'name',
            'field',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
