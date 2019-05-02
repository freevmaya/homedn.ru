<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PageOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'code')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'default_value')->textarea([ 'rows' => 6 ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?=
    $form->field($model, 'template_id')->dropDownList(ArrayHelper::map($template, 'id', 'path_front'), [
        'prompt' => [
            'text'    => 'Выберите шаблон', 'options' => [
                'value' => '0', 'class' => 'prompt', 'label' => 'Выберите шаблон'
            ]
        ],
    ])
    ?>

    <?=
    $form->field($model, 'option_type_id')->dropDownList(ArrayHelper::map($optionType, 'id', 'name'), [
        'prompt' => [
            'text'    => 'Выберите тип', 'options' => [
                'value' => '0', 'class' => 'prompt', 'label' => 'Выберите тип'
            ]
        ],
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
