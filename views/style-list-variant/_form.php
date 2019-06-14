<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\color\ColorInput;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\models\StyleListVariant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="style-list-variant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'style_list_id')->dropDownList(ArrayHelper::map($styleList, 'id', 'name', 'page.name')) ?>

    <?= $form->field($model, 'color')->widget(ColorInput::class) ?>

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

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
