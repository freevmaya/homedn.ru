<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\OptionType;

/* @var $this yii\web\View */
/* @var $model app\models\OptionType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="option-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?=
    $form->field($model, 'field')->dropDownList(OptionType::FIELD_TYPE, [
        'prompt' => [
            'text'    => 'Выберите тип поля', 'options' => [
                'value' => '0', 'class' => 'prompt', 'label' => 'Выберите тип поля'
            ]
        ],
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
