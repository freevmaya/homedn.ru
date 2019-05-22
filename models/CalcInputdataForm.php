<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use app\helpers\SiteProperty;
use app\models\CalcInputdata;
use yii\web\Cookie;

/**
 *
 * @property string $name
 * @property string $phone
 */
class CalcInputdataForm extends Model
{

    public $key;
    public $address;
    public $roomcount;
    public $square;
    public $doorcount;
    public $toiletcount;
    public $second;
    public $wall;
    public $address_name;

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'address_name' ], 'AddressNameValidate', 'message' => 'Укажите адрес' ],
            [ [ 'square' ], 'required', 'message' => 'Укажите площадь квартиры' ],
            [ [ 'key', 'address', 'square', 'address_name' ], 'string' ],
            [ [ 'roomcount', 'doorcount', 'toiletcount' ], 'integer' ],
            [ [ 'second', 'wall' ], 'integer' ],
        ];
    }

    public function AddressNameValidate ($attribute, $params)
    {
        return ($this->address != '') && ($this->address != null);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'address'     => 'Адрес квартиры или название ЖК',
            'roomcount'   => 'Количество комнат',
            'square'      => 'Площадь, м<sup>2</sup>',
            'doorcount'   => 'Количество дверей',
            'toiletcount' => 'Количество санузлов',
            'second'      => 'Квартира вторичка, нужен демонтаж',
            'wall'        => 'Нужно возвести стены',
        ];
    }

    public function getAttributePlaceholder ($attribute)
    {
        $placeholders = [
            'address' => 'адрес',
            'square'  => 'кв. м',
        ];
        return isset($placeholders[$attribute]) ? $placeholders[$attribute] : '';
    }

    public function send ()
    {
        if ($this->validate()) {
            $model            = $this->key ? CalcInputdata::find()->where([ 'key' => $this->key ])->one() : new CalcInputdata();
            $model->key       = $this->key ?: Yii::$app->security->generateRandomString();
            $model->user_data = json_encode($this->attributes);
            $model->save();

            $cookies = Yii::$app->response->cookies;
            $cookies->add(new Cookie([
                'expire' => time() + 60 * 60 * 24 * 30,
                'name'   => 'calculatorKey',
                'value'  => $model->key,
            ]));

            /* Yii::$app->mailer->compose([ 'html' => 'callorder' ], [ 'model' => $this ])
              ->setTo(explode(',', SiteProperty::getValue('email')))
              ->setFrom([ 'noreply@' . str_replace('www.', '', Yii::$app->request->hostName) => Yii::$app->name ])
              ->setSubject('Заказ звонка с сайта')
              ->send(); */
            return $model->key;
        }
        return false;
    }

    public function init ()
    {
        $cookies           = Yii::$app->request->cookies;
        $this->roomcount   = 1;
        $this->doorcount   = 1;
        $this->toiletcount = 1;
        if ($key               = $cookies->getValue('calculatorKey')) {
            if ($model = CalcInputdata::find()->where([ 'key' => $key ])->one()) {
                $this->setAttributes(json_decode($model->user_data, true));
                $this->key = $key;
            }
        }
    }

}
