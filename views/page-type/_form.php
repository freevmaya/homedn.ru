<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PageType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'code')->textInput([ 'maxlength' => true ]) ?>

    <?=
    $form->field($model, 'template_id')->dropDownList(ArrayHelper::map($templates, 'id', 'path_front'), [
        'prompt' => [ 'text' => 'Выберите шаблон', 'options' => [ 'value' => '0', 'class' => 'prompt', 'label' => 'Выберите шаблон' ] ],
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
