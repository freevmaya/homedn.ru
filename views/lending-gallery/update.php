<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LendingGallery */

$this->title                   = 'Изменить ' . $model->id;
$this->params['breadcrumbs'][] = [ 'label' => 'Галерея', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->id, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="lending-gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'page'  => $page,
    ])
    ?>

</div>
