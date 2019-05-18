<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_component_group}}".
 *
 * @property int $id
 * @property string $name
 * @property int $sort
 * @property int $image_order
 * @property int $size_element
 * @property int $calc_room_id
 * @property int $inputdata 
 *
 * @property CalcComponentElement[] $calcComponentElements
 * @property CalcRoom $calcRoom
 */
class CalcComponentGroup extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_component_group}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort', 'image_order', 'size_element', 'calc_room_id', 'inputdata' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 255 ],
            [ [ 'calc_room_id' ], 'exist', 'skipOnError' => true, 'targetClass' => CalcRoom::className(), 'targetAttribute' => [ 'calc_room_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'           => 'ID',
            'name'         => 'Название',
            'sort'         => 'Порядок',
            'image_order'  => 'Порядок наложения изображения',
            'size_element' => 'Большой размер иконки',
            'calc_room_id' => 'Комната',
            'inputdata'    => 'Зависимость от входных данных',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcComponentElements ()
    {
        return $this->hasMany(CalcComponentElement::className(), [ 'group_id' => 'id' ])->orderBy([ 'sort' => SORT_ASC ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcRoom ()
    {
        return $this->hasOne(CalcRoom::className(), [ 'id' => 'calc_room_id' ]);
    }

}
