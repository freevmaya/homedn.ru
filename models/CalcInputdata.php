<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_inputdata}}".
 *
 * @property int $id
 * @property string $key
 * @property string $user_data
 * @property string $calc_data
 * @property string $complect_data 
 */
class CalcInputdata extends \yii\db\ActiveRecord
{

    const RELATION_SET = [
        [
            'id'   => 0,
            'name' => '',
        ],
        [
            'id'   => 1,
            'name' => 'Количество комнат',
        ],
        [
            'id'   => 2,
            'name' => 'Площадь',
        ],
        [
            'id'   => 3,
            'name' => 'Количество дверей',
        ],
        [
            'id'   => 4,
            'name' => 'Количество санузлов',
        ],
        [
            'id'   => 5,
            'name' => 'Демонтаж',
        ],
        [
            'id'   => 6,
            'name' => 'Возведение стен',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%calc_inputdata}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'key' ], 'required' ],
            [ [ 'key' ], 'string', 'max' => 32 ],
            [ [ 'user_data', 'calc_data' ], 'string', 'max' => 2048 ],
            [ [ 'complect_data' ], 'string', 'max' => 1024 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'            => 'ID',
            'key'           => 'Key',
            'user_data'     => 'User Data',
            'calc_data'     => 'Calc Data',
            'complect_data' => 'Complect Data',
        ];
    }

}
