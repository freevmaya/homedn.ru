<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use kartik\color\ColorInput;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\StyleList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="style-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->dropDownList(ArrayHelper::map($page, 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'desc')->textarea([ 'maxlength' => true ]) ?>

    <div class="form-group">
        <?= Html::a('Цветовые решения', [ '/style-list-variant/index' ], [ 'class' => 'btn btn-default', 'target' => '_blank' ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
