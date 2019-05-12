<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgressGallery */

$this->title                   = 'Изменить ' . $model->year;
$this->params['breadcrumbs'][] = [ 'label' => 'Достижения', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->id, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="progress-gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
