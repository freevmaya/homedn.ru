<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы контента - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = 'Типы контента';
?>
<div class="page-type-index">

    <h1>Типы контента</h1>

    <p>
        <?= Html::a('Новый', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'template.path_front',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
