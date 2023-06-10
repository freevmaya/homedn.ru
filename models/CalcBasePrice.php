<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_base_price}}".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $inputdata
 */
class CalcBasePrice extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_base_price}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'price', 'inputdata' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'        => 'ID',
            'name'      => 'Название',
            'price'     => 'Базовая стоимость',
            'inputdata' => 'Зависимость от входных данных',
        ];
    }

    public function getCost ($userdata)
    {
        switch ($this->inputdata) {
            case 0:
                return $this->price;
            case 1:
                return $this->price * intval($userdata['roomcount']);
            case 2:
                return $this->price * intval($userdata['square']);
            case 3:
                return $this->price * intval($userdata['doorcount']);
            case 4:
                return $this->price * intval($userdata['toiletcount']);
            case 5:
                return $this->price * intval($userdata['second']) * $userdata['square'];
            case 6:
                return $this->price * intval($userdata['wall']) * $userdata['square'];
        }
        return $this->price;
    }

}
