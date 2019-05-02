<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'code')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'value')->textarea([ 'rows' => 6 ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'option_type_id')->dropDownList(ArrayHelper::map($optionType, 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
