<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <? /* = $form->field($model, 'menu_id')->textInput() */ ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'url')->textInput([ 'maxlength' => true ]) ?>

    <?=
    $form->field($model, 'page_id')->dropDownList(ArrayHelper::map($page, 'id', 'name'), [
        'prompt' => [
            'text'    => 'Выберите страницу', 'options' => [
                'value' => '', 'class' => 'prompt', 'label' => 'Выберите страницу'
            ]
        ],
    ])
    ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?=
    $form->field($model, 'menu_content_id')->dropDownList(ArrayHelper::map($parent, 'id', 'name'), [
        'prompt' => [
            'text'    => 'Выберите пункт меню', 'options' => [
                'value' => '', 'class' => 'prompt', 'label' => 'Выберите пункт меню'
            ]
        ],
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
