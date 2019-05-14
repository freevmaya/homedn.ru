<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioGallery */

$this->title                   = $model->id;
$this->params['breadcrumbs'][] = [ 'label' => 'Галерея', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="portfolio-gallery-view">

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
            'gallery_type',
            'page_id',
            'sort',
            'image',
        ],
    ])
    ?>

</div>
