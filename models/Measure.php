<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%measure}}".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $created_at
 * @property int $updated_at
 */
class Measure extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%measure}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'phone' ], 'required' ],
            [ [ 'created_at', 'updated_at' ], 'integer' ],
            [ [ 'name', 'phone' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'         => 'ID',
            'name'       => 'Имя',
            'phone'      => 'Телефон',
            'created_at' => 'Время заявки',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors ()
    {
        return [
            TimestampBehavior::class,
        ];
    }

}
