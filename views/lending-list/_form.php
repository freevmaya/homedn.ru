<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\elfinder\InputFile;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\LendingList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lending-list-form">

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


    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?=
    $form->field($model, 'desc')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
        ]),
    ])
    ?>

    <?= $form->field($model, 'desclink')->textInput([ 'maxlength' => true ]) ?>

    <?=
    $form->field($model, 'text')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
        ]),
    ])
    ?>

    <?= $form->field($model, 'list_number')->dropDownList([ 1 => 1, 2 => 2 ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
