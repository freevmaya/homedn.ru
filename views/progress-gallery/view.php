<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProgressGallery */

$this->title                   = $model->id;
$this->params['breadcrumbs'][] = [ 'label' => 'Достижения', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="progress-gallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', [ 'update', 'id' => $model->id ], [ 'class' => 'btn btn-primary' ]) ?>
        <?=
        Html::a('Удалить', [ 'delete', 'id' => $model->id ], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Удалить?',
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
            'year',
            'sort',
            'header',
            'content',
            'media',
            'video',
        ],
    ])
    ?>

</div>
