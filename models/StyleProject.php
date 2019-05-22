<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%style_project}}".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $style_list_id
 * @property string $color
 * @property int $created_at
 * @property int $updated_at
 *
 * @property StyleList $styleList
 */
class StyleProject extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%style_project}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'style_list_id', 'created_at', 'updated_at' ], 'integer' ],
            [ [ 'name', 'phone', 'color' ], 'string', 'max' => 255 ],
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
            'name'          => 'Имя',
            'phone'         => 'Телефон',
            'style_list_id' => 'Стиль',
            'color'         => 'Цвет',
            'created_at'    => 'Время заявки',
            'updated_at'    => 'Updated At',
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
