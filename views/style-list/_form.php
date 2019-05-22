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

    <?
    if ($model['image']) {
        ?>
        <div class="row">
            <div class="col-lg-1"><?= Html::img($model['image'], [ 'class' => 'img-responsive' ]) ?></div>
            <div class="col-lg-11">
            <? } ?>
            <?=
            $form->field($model, 'image')->widget(InputFile::class, [
                'language'      => 'ru',
                'controller'    => 'elfinder',
                'filter'        => 'image',
                'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                'options'       => [ 'class' => 'form-control' ],
                'buttonOptions' => [ 'class' => 'btn btn-default' ],
                'multiple'      => false,
                'buttonName'    => 'Обзор',
            ])
            ?>
            <?
            if ($model['image']) {
                ?>
            </div>
        </div>
    <? } ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'desc')->textarea([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'color1')->widget(ColorInput::class) ?>

    <?= $form->field($model, 'color2')->widget(ColorInput::class) ?>

    <?= $form->field($model, 'color3')->widget(ColorInput::class) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
