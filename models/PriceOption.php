<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%price_option}}".
 *
 * @property int $id
 * @property string $name
 * @property int $price_caption_id
 * @property int $min_price
 * @property int $sort
 *
 * @property PriceComposit[] $priceComposits
 * @property PriceCaption $priceCaption
 */
class PriceOption extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%price_option}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'price_caption_id' ], 'required' ],
            [ [ 'price_caption_id', 'min_price', 'sort' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 255 ],
            [ [ 'price_caption_id' ], 'exist', 'skipOnError' => true, 'targetClass' => PriceCaption::className(), 'targetAttribute' => [ 'price_caption_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'               => 'ID',
            'name'             => 'Название',
            'price_caption_id' => 'Раздел',
            'min_price'        => 'Минимальная цена',
            'sort'             => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceComposits ()
    {
        return $this->hasMany(PriceComposit::className(), [ 'price_option_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceCaption ()
    {
        return $this->hasOne(PriceCaption::className(), [ 'id' => 'price_caption_id' ]);
    }

}
