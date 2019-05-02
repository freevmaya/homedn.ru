<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Callorder */

$this->title = 'Update Callorder: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Callorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="callorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
