<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use app\helpers\SiteProperty;
use app\models\CalcRequest;

/**
 *
 * @property string $calckey 
 * @property string $name
 * @property string $phone
 * @property bool $accept 
 */
class CalcRequestForm extends Model
{

    public $calckey;
    public $name;
    public $phone;
    public $accept;

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'phone' ], 'required', 'message' => 'Укажите номер телефона' ],
            [ [ 'name', 'phone', 'calckey' ], 'string', 'max' => 255 ],
            [ [ 'accept' ], 'boolean' ],
            [ 'accept', 'compare', 'compareValue' => true, 'operator' => '==', 'type' => 'boolean', 'message' => 'Согласитесь с условиями политики конфиденциальности' ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'name'   => 'Ваше имя',
            'phone'  => 'Ваш телефон',
            'accept' => 'Согласен с ' . Html::a('политикой конфиденциальности', '/politics/', [ 'target' => '_blank', 'data-pjax' => 0 ]),
        ];
    }

    public function send ()
    {
        if ($this->validate()) {
            if (isset(\Yii::$app->request->get()['k'])) {
                $this->calckey = \Yii::$app->request->get()['k'];
            }
            $model = new CalcRequest();
            $model->setAttributes($this->getAttributes());
            $model->save();

            Yii::$app->mailer->compose([ 'html' => 'calcrequest' ], [ 'model' => $this ])
                    ->setTo(explode(',', SiteProperty::getValue('email')))
                    ->setFrom([ 'noreply@' . str_replace('www.', '', Yii::$app->request->hostName) => Yii::$app->name ])
                    ->setSubject('Заявка на замер с сайта')
                    ->send();
            return true;
        }
        return false;
    }

    public function fields ()
    {
        return [
            'name',
            'phone',
        ];
    }

    public function hiddenFields ()
    {
        return [
            'calckey',
        ];
    }

}
