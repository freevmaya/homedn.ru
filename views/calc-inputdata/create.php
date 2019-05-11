<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcInputdata */

$this->title = 'Create Calc Inputdata';
$this->params['breadcrumbs'][] = ['label' => 'Calc Inputdatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-inputdata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
