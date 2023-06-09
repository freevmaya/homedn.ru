<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use app\models\OptionType;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\SiteOption */

$this->title                   = 'Общее - Контент - Администрирование';
$this->params['breadcrumbs'][] = 'Общий контент';
?>
<div class="site-option-index">

    <h1>Общий контент</h1>

    <? ActiveForm::begin() ?>

    <?
    foreach ($siteOptions as $model) {

        echo Html::label($model->name, $model->code, [ 'class' => 'control-label' ]);
        echo '<br>';
//        print_r($model->optionType);
        switch (OptionType::FIELD_TYPE[$model->optionType->field]) {
            case OptionType::FIELD_IMAGE:
                echo InputFile::widget([
                    'id'            => $model->code,
                    'language'      => 'ru',
                    'controller'    => 'elfinder',
                    'filter'        => 'image',
                    'name'          => $model->code,
                    'value'         => $model->value,
                    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                    'buttonName'    => 'Обзор',
                    'buttonOptions' => [ 'class' => 'btn btn-default' ],
                    'options'       => [ 'class' => 'form-control' ],
                ]);
                break;

            case OptionType::FIELD_INPUT:
                echo Html::textInput($model->code, $model->value, [
                    'id'    => $model->code,
                    'class' => 'form-control',
                ]);
                break;

            case OptionType::FIELD_TEXTAREA:
                echo Html::textarea($model->code, $model->value, [
                    'id'    => $model->code,
                    'class' => 'form-control',
                    'rows'  => 6,
                ]);
                break;

            case OptionType::FIELD_BUTTON:
                echo Html::a($model->name, $model->value, [ 'class' => 'btn btn-default', 'target' => '_blank' ]);
                echo '<br>';
                break;

            case OptionType::FIELD_WYSIWYG:
                echo CKEditor::widget([
                    'id'            => $model->code,
                    'name'          => $model->code,
                    'value'         => $model->value,
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                        'preset' => 'full',
                        'inline' => false,
                    ])
                ]);
                break;
        }
        echo '<br>';
    }
    ?>

    <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>

    <? ActiveForm::end() ?>

</div>
