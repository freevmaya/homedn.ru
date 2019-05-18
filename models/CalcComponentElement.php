<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_component_element}}".
 *
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $sort
 * @property int $default
 * @property int $group_id
 * @property string $local_group
 * @property int $price
 * @property string $icon
 * @property string $image
 * @property int $countable 
 *
 * @property CalcComponentGroup $group
 * @property int $cost
 */
class CalcComponentElement extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_component_element}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort', 'default', 'group_id', 'price', 'countable' ], 'integer' ],
            [ [ 'name', 'desc', 'local_group', 'icon', 'image' ], 'string', 'max' => 255 ],
            [ [ 'group_id' ], 'exist', 'skipOnError' => true, 'targetClass' => CalcComponentGroup::className(), 'targetAttribute' => [ 'group_id' => 'id' ] ],
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
            'desc'        => 'Описание',
            'sort'        => 'Порядок',
            'default'     => 'По умолчанию',
            'group_id'    => 'Группа элементов',
            'local_group' => 'Местная группа',
            'price'       => 'Цена за шт./м/кв.м',
            'icon'        => 'Иконка',
            'image'       => 'Изображение',
            'countable'   => 'Разрешить указывать количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup ()
    {
        return $this->hasOne(CalcComponentGroup::className(), [ 'id' => 'group_id' ]);
    }

    public function getCost ($userdata)
    {
        if ($this->countable) {
            return $this->price;
        }
        switch ($this->group->inputdata) {
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
        }
        return $this->price;
    }

}
