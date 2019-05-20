<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_collect}}".
 *
 * @property int $id
 * @property string $name
 * @property int $sort
 * @property string $image
 * @property string $link
 * 
 * @property string $key 
 */
class CalcCollect extends \yii\db\ActiveRecord
{

//    public $key;

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_collect}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort' ], 'integer' ],
            [ [ 'name', 'image', 'link' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'    => 'ID',
            'name'  => 'Название',
            'sort'  => 'Порядок',
            'image' => 'Изображение',
            'link'  => 'Ссылка на конфигурацию (или уникальный ключ)',
        ];
    }

    public function getKey ()
    {
        return array_reverse(explode('/', trim($this->link, '/')))[0];
    }

    public function getInputdata ()
    {
        return CalcInputdata::find()->where([ 'key' => $this->key ])->one()->calc_data;
    }

}
