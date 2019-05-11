<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%price_element}}".
 *
 * @property int $id
 * @property string $name
 * @property int $price_caption_id
 * @property string $description
 * @property int $sort
 *
 * @property PriceComposit[] $priceComposits
 * @property PriceCaption $priceCaption
 */
class PriceElement extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%price_element}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'price_caption_id' ], 'required' ],
            [ [ 'price_caption_id', 'sort' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 255 ],
            [ [ 'description' ], 'string', 'max' => 1024 ],
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
            'description'      => 'Описание',
            'sort'             => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceComposits ()
    {
        return $this->hasMany(PriceComposit::className(), [ 'price_element_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceCaption ()
    {
        return $this->hasOne(PriceCaption::className(), [ 'id' => 'price_caption_id' ]);
    }

}
