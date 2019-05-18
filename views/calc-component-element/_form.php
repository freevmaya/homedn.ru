<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\models\CalcComponentElement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calc-component-element-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'desc')->textarea([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'default')->checkbox([ 'uncheck' => 0 ]) ?>

    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map($calcComponentGroups, 'id', 'name')) ?>

    <?= $form->field($model, 'local_group')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?
    if ($model['icon']) {
        ?>
        <div class="row">
            <div class="col-lg-1"><?= Html::img($model['icon'], [ 'class' => 'img-responsive' ]) ?></div>
            <div class="col-lg-11">
            <? } ?>
            <?=
            $form->field($model, 'icon')->widget(InputFile::className(), [
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
            if ($model['icon']) {
                ?>
            </div>
        </div>
    <? } ?>

    <?
    if ($model['image']) {
        ?>
        <div class="row">
            <div class="col-lg-1"><?= Html::img($model['image'], [ 'class' => 'img-responsive' ]) ?></div>
            <div class="col-lg-11">
            <? } ?>
            <?=
            $form->field($model, 'image')->widget(InputFile::className(), [
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
    
    <?= $form->field($model, 'countable')->checkbox([ 'uncheck' => 0 ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
