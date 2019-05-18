<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_room}}".
 *
 * @property int $id
 * @property string $name
 * @property string $baseimage
 * @property int $sort
 *
 * @property CalcComponentGroup[] $calcComponentGroups
 */
class CalcRoom extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_room}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'name' ], 'required' ],
            [ [ 'sort' ], 'integer' ],
            [ [ 'name', 'baseimage' ], 'string', 'max' => 255 ],
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
            'baseimage' => 'Базовое изображение',
            'sort'      => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalcComponentGroups ()
    {
        return $this->hasMany(CalcComponentGroup::className(), [ 'calc_room_id' => 'id' ])->orderBy([ 'sort' => SORT_ASC ]);
    }

}
