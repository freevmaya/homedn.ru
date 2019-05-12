<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\models\ProgressGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'header')->textarea([ 'maxlength' => true ]) ?>

    <?=
    $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
        ]),
    ])
    ?>

    <?=
    $form->field($model, 'media')->widget(InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder',
        'filter'        => 'image',
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => [ 'class' => 'form-control' ],
        'buttonOptions' => [ 'class' => 'btn btn-default' ],
        'multiple'      => true,
        'buttonName'    => 'Обзор',
    ])
    ?>

    <?= $form->field($model, 'video')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
