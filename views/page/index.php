<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = ($pageType ? $pageType->name : 'Записи') . ' - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $pageType ? $pageType->name : 'Записи';
?>
<div class="page-index">

    <h1><?= $pageType ? $pageType->name : 'Записи' ?></h1>

    <p>
        <?= $pageType ? Html::a('Создать', [ 'create', 'page_type' => $pageType->code ], [ 'class' => 'btn btn-success' ]) : Html::a('Создать', [
                    'create' ], [ 'class' => 'btn btn-success' ])
        ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel'  => $searchModel ?: null,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'id',
            'name',
            'sort',
//            'page_type_id',
            [
                'attribute' => 'page.name',
                'label'     => 'Родитель',
            ],
            'template.path_front',
            'status',
            //'created_at',
            //'updated_at',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
