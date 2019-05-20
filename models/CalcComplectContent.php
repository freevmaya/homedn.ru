<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_complect_content}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $sort
 * @property int $mandatory
 * @property int $price
 * @property int $countable
 */
class CalcComplectContent extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_complect_content}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort', 'mandatory', 'price', 'countable' ], 'integer' ],
            [ [ 'name', 'image' ], 'string', 'max' => 255 ],
            [ [ 'description' ], 'string', 'max' => 1024 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'          => 'ID',
            'name'        => 'Заголовок',
            'description' => 'Описание',
            'image'       => 'Изображение',
            'sort'        => 'Порядок',
            'mandatory'   => 'Обязательный элемент',
            'price'       => 'Стоимость',
            'countable'   => 'Количественный',
        ];
    }

}
