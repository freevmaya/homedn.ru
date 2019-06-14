<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%style_list_variant}}".
 *
 * @property int $id
 * @property int $style_list_id
 * @property string $color
 * @property string $image
 * @property int $sort
 *
 * @property StyleList $styleList
 */
class StyleListVariant extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%style_list_variant}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'style_list_id', 'color', 'image' ], 'required' ],
            [ [ 'style_list_id', 'sort' ], 'integer' ],
            [ [ 'color', 'image' ], 'string', 'max' => 255 ],
            [ [ 'style_list_id' ], 'exist', 'skipOnError' => true, 'targetClass' => StyleList::className(), 'targetAttribute' => [ 'style_list_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'            => 'ID',
            'style_list_id' => 'Стиль',
            'color'         => 'Цвет',
            'image'         => 'Изображение',
            'sort'          => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStyleList ()
    {
        return $this->hasOne(StyleList::className(), [ 'id' => 'style_list_id' ]);
    }

}
