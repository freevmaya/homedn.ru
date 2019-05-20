<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%calc_request}}".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $calckey
 * @property int $created_at
 * @property int $updated_at
 */
class CalcRequest extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_request}}';
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

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'created_at', 'updated_at' ], 'integer' ],
            [ [ 'name', 'phone', 'calckey' ], 'string', 'max' => 255 ],
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
            'calckey'    => 'Ключ',
            'created_at' => 'Время заявки',
            'updated_at' => 'Updated At',
        ];
    }

}
