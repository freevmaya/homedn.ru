<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title                   = $model->name;
$this->params['breadcrumbs'][] = [ 'label' => $model->pageType->name, 'url' => [ 'index', 'page_type' => $model->pageType->code ] ];
$this->params['breadcrumbs'][] = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="page-view">

    <h1><?= $model->name ?></h1>

    <p>
        <?= Html::a('Изменить', [ 'update', 'id' => $model->id ], [ 'class' => 'btn btn-primary' ]) ?>
        <?=
        Html::a('Удалить', [ 'delete', 'id' => $model->id ], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'name',
            'sort',
            'page_type_id',
            'page_id',
            'template_id',
            'status',
            'pageSeo.url',
            'pageSeo.h1',
            'pageSeo.keywords',
            'pageSeo.description',
            'pageSeo.content',
            'pageSeo.noindex',
        ],
    ])
    ?>

</div>
