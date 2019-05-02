<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'id',
            'name',
            'position',
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {list}',
                'buttons'  => [
                    'list' => function($url, $model, $key)
                    {
                        return Html::a(Html::tag('span', '', [ 'class' => "glyphicon glyphicon-menu-hamburger" ]), [ '/menu-content/index', 'menu_id' => $model->id ], [
                                    'title' => 'Состав', 'aria-label' => 'Состав', 'data-pjax' => '0', ]);
                    }
                ],
            ],
        ],
    ]);
    ?>
</div>
