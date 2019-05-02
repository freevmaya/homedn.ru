<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%site_option}}".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $value
 * @property int $sort
 * @property int $option_type_id
 *
 * @property OptionType $optionType
 */
class SiteOption extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%site_option}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'name', 'code', 'option_type_id' ], 'required' ],
            [ [ 'value' ], 'string' ],
            [ [ 'sort', 'option_type_id' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 1024 ],
            [ [ 'code' ], 'string', 'max' => 64 ],
            [ [ 'code' ], 'unique' ],
            [ [ 'option_type_id' ], 'exist', 'skipOnError' => true, 'targetClass' => OptionType::className(), 'targetAttribute' => [ 'option_type_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'             => 'ID',
            'name'           => 'Название',
            'code'           => 'Код',
            'value'          => 'Значение',
            'sort'           => 'Порядок',
            'option_type_id' => 'Тип данных',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionType ()
    {
        return $this->hasOne(OptionType::className(), [ 'id' => 'option_type_id' ]);
    }

}
