<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gallery_type')->dropDownList([ 1 => 'Выполненная работа', 2 => 'До начала работы' ]) ?>

    <?= $form->field($model, 'page_id')->dropDownList(ArrayHelper::map($pages, 'id', 'name')) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

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

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
