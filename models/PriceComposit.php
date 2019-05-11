<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%price_composit}}".
 *
 * @property int $id
 * @property int $price_option_id
 * @property int $price_element_id
 *
 * @property PriceElement $priceElement
 * @property PriceOption $priceOption
 */
class PriceComposit extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%price_composit}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'price_option_id', 'price_element_id' ], 'required' ],
            [ [ 'price_option_id', 'price_element_id' ], 'integer' ],
            [ [ 'price_element_id' ], 'exist', 'skipOnError' => true, 'targetClass' => PriceElement::className(), 'targetAttribute' => [ 'price_element_id' => 'id' ] ],
            [ [ 'price_option_id' ], 'exist', 'skipOnError' => true, 'targetClass' => PriceOption::className(), 'targetAttribute' => [ 'price_option_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'               => 'ID',
            'price_option_id'  => 'Раздел',
            'price_element_id' => 'Элемент',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceElement ()
    {
        return $this->hasOne(PriceElement::className(), [ 'id' => 'price_element_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceOption ()
    {
        return $this->hasOne(PriceOption::className(), [ 'id' => 'price_option_id' ]);
    }

}
