<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Этапы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workstep-index">

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
//            'page_id',
            'page.name:text:Страница',
            'name',
//            'image',
//            'description',
            //'sort',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
