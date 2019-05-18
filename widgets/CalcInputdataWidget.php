<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use valekstepanov\yii2kladr\Kladr;
use app\models\CalcInputdata;
use app\models\CalcInputdataForm;
use app\helpers\SiteProperty;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

/**
 * Description of CalcInputdataWidget
 *
 * @author stepanov
 */
class CalcInputdataWidget extends Widget
{

    public $calcHeader;
    public $submitButton;
    protected $calcForm;
    protected $calcKey;

    public function init ()
    {
        $this->calcForm = new CalcInputdataForm();
        if ($this->calcForm->load(Yii::$app->request->post()) && ($this->calcKey  = $this->calcForm->send())) {
            $this->view->context->redirect([ 'site/frontend', 'id' => SiteProperty::getValue('calcpageid'), 'k' => $this->calcKey ]);
            Yii::$app->end();
        } /* else {
          $cookies       = Yii::$app->request->cookies;
          $this->calcKey = $cookies->getValue('calculatorKey', false);
          if ($this->calcKey) {
          if ($calcData = CalcInputdata::find()->where([ 'key' => $this->calcKey ])->one()) {
          $this->calcForm->setAttributes(json_decode($calcData->user_data, true));
          $this->calcForm->key = $calcData->key;
          }
          }
          } */
    }

    public function run ()
    {
        if ($this->calcForm) {
            echo Html::tag('div', $this->calcHeader, [ 'class' => 'calc-header' ]);
            $form = ActiveForm::begin();

            echo $form->field($this->calcForm, 'key')->hiddenInput()->label(false);
            $this->calcForm->address = $this->calcForm->address_name;
            echo $form->field($this->calcForm, 'address')->widget(Kladr::className(), [
                'oneString'   => true,
                'parentType'  => Kladr::TYPE_REGION,
                'parentId'    => '7200000000000',
                'type'        => Kladr::TYPE_BUILDING,
                'labelFormat' => new JsExpression("function(obj, query){
                                if (obj.parents) {
                                        let address = '';
                                        objs = obj.parents.filter((item) => {  return ['city', 'street', 'building'].indexOf(item.contentType)!==-1?true:false; });
					objs.push(obj);
                                        $.each(objs, (i, obj) => { address += (address !== '' ? ', ' : '') + obj.typeShort + '. ' + obj.name; })

					return address;
				}

				return (obj.typeShort ? obj.typeShort + '. ' : '') + obj.name;
                                }"),
                'valueFormat' => new JsExpression("function(obj, query){
                                if (obj.parents) {
                                        let address = '';
                                        objs = obj.parents.filter((item) => { return ['city', 'street', 'building'].indexOf(item.contentType)!==-1?true:false; });
					objs.push(obj);
                                        $.each(objs, (i, obj) => { address += (address !== '' ? ', ' : '') + obj.typeShort + '. ' + obj.name; })

					return address;
				}

				return (obj.typeShort ? obj.typeShort + '. ' : '') + obj.name;
                                }"),
                'options'     => [
                    'placeHolder' => $this->calcForm->getAttributePlaceholder('address'),
                    'class'       => 'address',
                ]
            ]);

            echo Html::beginTag('div', [ 'class' => 'roomcount-group' ]);
            echo $form->field($this->calcForm, 'roomcount')->hiddenInput([
                'id'       => 'roomcount',
                'onchange' => "$('input[name=\"roomcount-string\"]').inputmask('setvalue', $(this).val())",
            ]);
            echo Html::button('-', [
                'class'   => 'spin-down',
                'onclick' => "if($('#roomcount').val()!=1) $('#roomcount').val(+$('#roomcount').val() - 1).change()",
            ]);
            echo MaskedInput::widget([
                'name'    => 'roomcount-string',
                'mask'    => '9-комнатная',
                'value'   => $this->calcForm->roomcount,
                'options' => [
                    'readonly' => true,
                    'onchange' => "$('#roomcount').val($(this).inputmask('unmaskedvalue'))",
                ],
            ]);
            echo Html::button('+', [
                'class'   => 'spin-up',
                'onclick' => "if(+$('#roomcount').val()<9)  $('#roomcount').val(+$('#roomcount').val() + 1).change()",
            ]);
            echo Html::endTag('div');

            echo $form
                    ->field($this->calcForm, 'square', [
                        'labelOptions' => [
                            'encode' => false,
                            'label'  => $this->calcForm->getAttributeLabel('square'),
                            'class'  => ''
                        ],
                    ])
                    ->textInput([
                        'placeholder' => $this->calcForm->getAttributePlaceholder('square'),
                        'class'       => '',
            ]);

            echo Html::beginTag('div', [ 'class' => 'doorcount-group' ]);
            echo $form->field($this->calcForm, 'doorcount')->hiddenInput([
                'id'       => 'doorcount',
                'onchange' => "$('input[name=\"doorcount-string\"]').val($(this).val())",
            ]);
            echo Html::button('-', [
                'class'   => 'spin-down',
                'onclick' => "if($('#doorcount').val()!=1) $('#doorcount').val(+$('#doorcount').val() - 1).change()",
            ]);
            echo Html::textInput('doorcount-string', $this->calcForm->doorcount, [
                'readonly' => true,
                'onchange' => "$('#doorcount').val($(this).val())",
            ]);
            echo Html::button('+', [
                'class'   => 'spin-up',
                'onclick' => "if(+$('#doorcount').val()<12)  $('#doorcount').val(+$('#doorcount').val() + 1).change()",
            ]);
            echo Html::endTag('div');

            echo Html::beginTag('div', [ 'class' => 'toiletcount-group' ]);
            echo $form->field($this->calcForm, 'toiletcount')->hiddenInput([
                'id'       => 'toiletcount',
                'onchange' => "$('input[name=\"toiletcount-string\"]').val($(this).val())",
            ]);
            echo Html::button('-', [
                'class'   => 'spin-down',
                'onclick' => "if($('#toiletcount').val()!=1) $('#toiletcount').val(+$('#toiletcount').val() - 1).change()",
            ]);
            echo Html::textInput('toiletcount-string', $this->calcForm->doorcount, [
                'readonly' => true,
                'onchange' => "$('#toiletcount').val($(this).val())",
            ]);
            echo Html::button('+', [
                'class'   => 'spin-up',
                'onclick' => "if(+$('#toiletcount').val()<3)  $('#toiletcount').val(+$('#toiletcount').val() + 1).change()",
            ]);
            echo Html::endTag('div');

            echo $form->field($this->calcForm, 'second')->checkbox([ 'uncheck' => 0, 'label' => Html::tag('span', $this->calcForm->getAttributeLabel('second')) ])->label(false);

            echo $form->field($this->calcForm, 'wall')->checkbox([ 'uncheck' => 0, 'label' => Html::tag('span', $this->calcForm->getAttributeLabel('wall')) ])->label(false);

            echo Html::submitButton($this->submitButton . Html::img(Yii::$app->params['image_dir_url'] . 'arright.png'));

            ActiveForm::end();
        }
    }

}
