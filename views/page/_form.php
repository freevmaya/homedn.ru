<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use app\models\OptionType;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (!$model->page_type_id) { ?>
        <?=
        $form->field($model, 'page_type_id')->dropDownList(ArrayHelper::map($pageType, 'id', 'name'), [
            'prompt' => [
                'text'    => 'Выберите тип объекта', 'options' => [
                    'value' => '', 'class' => 'prompt', 'label' => 'Выберите тип объекта'
                ]
            ],
        ])
        ?>
    <?php } ?>

    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?php /*
      if ($model->page_type_id) {
      ?>
      <?= $form->field($model, 'page_type_id')->textInput() ?>
      <?php } */ ?>

    <?=
    $form->field($model, 'page_id')->dropDownList(ArrayHelper::map($parent, 'id', 'name'), [
        'prompt' => [
            'text'    => 'Выберите объект', 'options' => [
                'value' => '', 'class' => 'prompt', 'label' => 'Выберите объект'
            ]
        ],
    ])
    ?>

    <?=
    $form->field($model, 'template_id')->dropDownList(ArrayHelper::map($template, 'id', 'path_front'), [
        'prompt' => [
            'text'    => 'Выберите шаблон', 'options' => [
                'value' => '', 'class' => 'prompt', 'label' => 'Выберите шаблон'
            ]
        ],
    ])
    ?>

    <?=
    $form->field($model, 'status')->dropDownList([
        '1' => 'Активно',
        '0' => 'Неактивно',
    ])
    ?>

    <? /* = $form->field($model, 'created_at')->textInput() */ ?>

    <? /* = $form->field($model, 'updated_at')->textInput() */ ?>

    <h2>SEO</h2>

    <?= $form->field($modelSeo, 'url')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($modelSeo, 'h1')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($modelSeo, 'title')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($modelSeo, 'keywords')->textInput([ 'maxlength' => true ]) ?>

    <?= $form->field($modelSeo, 'description')->textarea([ 'maxlength' => true ]) ?>

    <?=
    $form->field($modelSeo, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
        ]),
    ])
    ?>

    <?= $form->field($modelSeo, 'noindex')->checkbox([ 'uncheck' => 0 ]) ?>

    <? if ($model->template_id) { ?>
        <br>
        <h2>Свойства</h2>

        <?
//        ArrayHelper::multisort($model->template->pageOptions, 'sort', SORT_ASC, SORT_NUMERIC);
        foreach ($model->template->pageOptions as $option) {
            echo Html::label($option->name, $option->code, [ 'class' => 'control-label' ]);
            echo '<br>';

            switch (OptionType::FIELD_TYPE[$option->optionType->field]) {
                case OptionType::FIELD_IMAGE:
                    echo InputFile::widget([
                        'id'            => $option->code,
                        'language'      => 'ru',
                        'controller'    => 'elfinder',
                        'filter'        => 'image',
                        'name'          => $option->code,
                        'value'         => isset($option->values[$model->id]) ? $option->values[$model->id] : '',
                        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                        'buttonName'    => 'Обзор',
                        'buttonOptions' => [ 'class' => 'btn btn-default' ],
                        'options'       => [ 'class' => 'form-control' ],
                    ]);
                    break;

                case OptionType::FIELD_INPUT:
                    echo Html::textInput($option->code, isset($option->values[$model->id]) ? $option->values[$model->id] : '', [
                        'id'    => $option->code,
                        'class' => 'form-control',
                    ]);
                    break;

                case OptionType::FIELD_TEXTAREA:
                    echo Html::textarea($option->code, isset($option->values[$model->id]) ? $option->values[$model->id] : '', [
                        'id'    => $option->code,
                        'class' => 'form-control',
                        'rows'  => 6,
                    ]);
                    break;

                case OptionType::FIELD_FILE:
                    echo InputFile::widget([
                        'id'            => $option->code,
                        'language'      => 'ru',
                        'controller'    => 'elfinder',
                        'name'          => $option->code,
                        'value'         => isset($option->values[$model->id]) ? $option->values[$model->id] : '',
                        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                        'buttonName'    => 'Обзор',
                        'buttonOptions' => [ 'class' => 'btn btn-default' ],
                        'options'       => [ 'class' => 'form-control' ],
                    ]);
                    break;

                case OptionType::FIELD_WYSIWYG:
                    echo CKEditor::widget([
                        'id'            => $option->code,
                        'name'          => $option->code,
                        'value'         => isset($option->values[$model->id]) ? $option->values[$model->id] : '',
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                            'preset' => 'full',
                            'inline' => false,
                        ])
                    ]);
                    break;

                case OptionType::FIELD_BUTTON:
                    echo Html::a($option->name, $option->default_value, [ 'class' => 'btn btn-default', 'target' => '_blank' ]);
                    echo '<br>';
                    break;
            }
            echo '<br>';
        }
        ?>
    <? } ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
