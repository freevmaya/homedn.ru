<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcRequest */

$this->title = 'Create Calc Request';
$this->params['breadcrumbs'][] = ['label' => 'Calc Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
