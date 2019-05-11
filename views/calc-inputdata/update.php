<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcInputdata */

$this->title = 'Update Calc Inputdata: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Calc Inputdatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calc-inputdata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
