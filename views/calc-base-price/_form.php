<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CalcBasePrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calc-base-price-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'inputdata')->dropDownList(ArrayHelper::map($calcInputdata, 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
