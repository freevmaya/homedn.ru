<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%calc_inputdata}}".
 *
 * @property int $id
 * @property string $key
 * @property string $user_data
 */
class CalcInputdata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%calc_inputdata}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key'], 'string', 'max' => 32],
            [['user_data'], 'string', 'max' => 2048],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'user_data' => 'User Data',
        ];
    }
}
