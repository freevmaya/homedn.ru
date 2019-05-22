<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/**
 * Description of WebinarFormWidget
 *
 * @author stepanov
 */
class FormViewWidget extends Widget
{

    public $formClass;
    public $submitMessage;
    public $header;
    public $subheader;
    protected $displayForm;
    protected $successMessage;
    protected $errorMessage;

    public function init ()
    {
        $formClass         = $this->formClass;
        $this->displayForm = new $formClass();
        if ($this->displayForm->load(Yii::$app->request->post())) {
            if ($this->displayForm->send()) {
                $this->successMessage = "Ваша заявка успешно отправлена.";
            } else {
                $this->errorMessage = "Произошла ошибка. Попробуйте еще раз.";
            }
        }
    }

    public function run ()
    {
        if ($this->displayForm) {
            Pjax::begin([
                'id'           => 'view-form-widget-' . $this->id,
                'formSelector' => '#view-form-' . $this->id,
            ]);

            if ($this->successMessage) {
                echo Html::tag('div', $this->successMessage, [ 'class' => 'success-message' ]);
            } else {
                if ($this->header) {
                    echo Html::tag('div', $this->header, [ 'class' => 'header' ]);
                }
                if ($this->subheader) {
                    echo Html::tag('div', $this->subheader, [ 'class' => 'subheader' ]);
                }

                echo Html::tag('div', $this->errorMessage, [ 'class' => 'error-message' ]);

                echo Html::beginTag('div', [ 'class' => 'form-container' ]);

                $form = ActiveForm::begin([ 'id' => 'view-form-' . $this->id ]);

                if (method_exists($this->displayForm, 'hiddenFields')) {
                    foreach ($this->displayForm->hiddenFields() as $field) {
                        echo $form->field($this->displayForm, $field)->hiddenInput()->label(false);
                    }
                }

                foreach ($this->displayForm->fields() as $field) {
                    if ($field == 'phone') {
                        echo $form->field($this->displayForm, $field)
                                ->widget(MaskedInput::className(), [
                                    'mask'    => '+7 (999) 999 99 99',
                                    'options' => [
                                        'id'          => 'inputmask-' . $this->id,
                                        'placeholder' => $this->displayForm->getAttributeLabel($field),
                                    ],
                                ])
                                ->label(false);
                    } else {
                        echo $form->field($this->displayForm, $field)->textInput([
                            'maxlength'   => true,
                            'placeholder' => $this->displayForm->getAttributeLabel($field)
                        ])->label(false);
                    }
                }

                echo '<br>';

                echo Html::submitButton($this->submitMessage);

                if ($this->displayForm->hasProperty('accept')) {
                    echo '<br>';
                    echo $form->field($this->displayForm, 'accept')->checkbox([
                        'label'        => Html::tag('span', $this->displayForm->getAttributeLabel('accept')),
                        'labelOptions' => [
                            'class' => 'checkbox-label'
                        ],
                        'checked'      => true
                    ])->label(false);
                }

                ActiveForm::end();
            }
            echo Html::endTag('div');
            Pjax::end();
        }
    }

}
