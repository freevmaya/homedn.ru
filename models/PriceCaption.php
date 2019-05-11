<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%price_caption}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $sort
 *
 * @property PriceElement[] $priceElements
 * @property PriceOption[] $priceOptions
 */
class PriceCaption extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%price_caption}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort' ], 'integer' ],
            [ [ 'name', 'description' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'          => 'ID',
            'name'        => 'Название',
            'description' => 'Описание под заголовком',
            'sort'        => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceElements ()
    {
        return $this->hasMany(PriceElement::className(), [ 'price_caption_id' => 'id' ])->orderBy([ 'sort' => SORT_ASC ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceOptions ()
    {
        return $this->hasMany(PriceOption::className(), [ 'price_caption_id' => 'id' ])->orderBy([ 'sort' => SORT_ASC ]);
    }

    public function getPriceComposits ()
    {
        return PriceComposit::find()->where([ 'price_option_id' => ArrayHelper::getColumn($this->priceOptions, 'id'), 'price_element_id' => ArrayHelper::getColumn($this->priceElements, 'id') ])->all();
    }

}
