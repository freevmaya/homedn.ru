<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\models\CalcRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calc-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?
    if ($model['baseimage']) {
        ?>
        <div class="row">
            <div class="col-lg-1"><?= Html::img($model['baseimage'], [ 'class' => 'img-responsive' ]) ?></div>
            <div class="col-lg-11">
            <? } ?>
            <?=
            $form->field($model, 'baseimage')->widget(InputFile::className(), [
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
            if ($model['baseimage']) {
                ?>
            </div>
        </div>
    <? } ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
