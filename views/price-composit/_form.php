<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PriceComposit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-composit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price_option_id')->textInput() ?>

    <?= $form->field($model, 'price_element_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
