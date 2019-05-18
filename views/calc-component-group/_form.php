<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CalcComponentGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calc-component-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'image_order')->textInput() ?>

    <?= $form->field($model, 'size_element')->checkbox([ 'uncheck' => 0 ]) ?>

    <?= $form->field($model, 'calc_room_id')->dropDownList(ArrayHelper::map($calcRooms, 'id', 'name')) ?>

    <?= $form->field($model, 'inputdata')->dropDownList(ArrayHelper::map($calcInputdata, 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
