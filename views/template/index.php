<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Шаблоны - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = 'Шаблоны';
?>
<div class="template-index">

    <h1>Шаблоны</h1>

    <p>
        <?= Html::a('Новый', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'id',
            'path_front',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
