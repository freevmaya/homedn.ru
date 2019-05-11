<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioReview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'header')->textarea([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'page_id')->dropDownList(ArrayHelper::map($portfolioElement, 'id', 'name')) ?>

    <?= $form->field($model, 'video')->textInput([ 'maxlength' => true ]) ?>

    <?
    if ($model['cover']) {
        ?>
        <div class="row">
            <div class="col-lg-1"><?= Html::img($model['cover'], [ 'class' => 'img-responsive' ]) ?></div>
            <div class="col-lg-11">
            <? } ?>
            <?=
            $form->field($model, 'cover')->widget(InputFile::className(), [
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
            if ($model['cover']) {
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
