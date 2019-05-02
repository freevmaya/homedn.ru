<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Атрибуты - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = 'Атрибуты';
?>
<div class="page-option-index">

    <h1>Атрибуты</h1>

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
            'code',
//            'default_value:ntext',
            'sort',
            //'template_id',
            //'option_type_id',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
