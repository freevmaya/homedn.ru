<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OfficeGallery */

$this->title                   = 'Изменить ' . $model->id;
$this->params['breadcrumbs'][] = [ 'label' => 'Галерея офиса', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->id, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="office-gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
