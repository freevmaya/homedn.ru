<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title                   = $model->fio;
$this->params['breadcrumbs'][] = [ 'label' => 'Команда', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

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
            'fio',
            'place',
            'photo1',
            'photo2',
            'video',
            'sort',
            'sort_slide',
            'designer',
        ],
    ])
    ?>

</div>
