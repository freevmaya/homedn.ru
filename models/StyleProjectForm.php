<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use app\helpers\SiteProperty;
use app\models\StyleList;
use app\models\StyleProject;

/**
 *
 * @property string $name
 * @property string $phone
 */
class StyleProjectForm extends Model
{

    public $name;
    public $phone;
    public $accept;
    public $style;
    public $color;

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'phone' ], 'required', 'message' => 'Укажите номер телефона' ],
            [ [ 'name', 'phone', 'color' ], 'string', 'max' => 255 ],
            [ [ 'accept' ], 'boolean' ],
            [ 'accept', 'compare', 'compareValue' => true, 'operator' => '==', 'type' => 'boolean', 'message' => 'Согласитесь с условиями политики конфиденциальности' ],
            [ [ 'style' ], 'integer' ],
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
            $model = new StyleProject();
            $model->setAttributes($this->getAttributes());
            $model->save();

            $project = StyleList::find()->where([ 'id' => $this->style ])->one();

            Yii::$app->mailer->compose([ 'html' => 'styleproject' ], [ 'model' => $this, 'project' => $project ])
                    ->setTo(explode(',', SiteProperty::getValue('email')))
                    ->setFrom([ 'noreply@' . str_replace('www.', '', Yii::$app->request->hostName) => Yii::$app->name ])
                    ->setSubject('Заказ на расчет проекта')
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
            'style',
            'color',
        ];
    }

}
