<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%option_type}}".
 *
 * @property int $id
 * @property string $name
 * @property string $field
 *
 * @property PageOption[] $pageOptions
 * @property SiteOption[] $siteOptions
 */
class OptionType extends \yii\db\ActiveRecord
{

    const FIELD_INPUT    = 'input';
    const FIELD_TEXTAREA = 'textarea';
    const FIELD_PASSWORD = 'password';
    const FIELD_IMAGE    = 'image';
    const FIELD_TEXT     = 'text';
    const FIELD_WYSIWYG  = 'wysiwyg';
    const FIELD_FILE     = 'file';
    const FIELD_BUTTON   = 'button';
    const FIELD_TYPE     = [
        1 => self::FIELD_INPUT,
        2 => self::FIELD_TEXTAREA,
        3 => self::FIELD_PASSWORD,
        4 => self::FIELD_IMAGE,
        5 => self::FIELD_TEXT,
        6 => self::FIELD_WYSIWYG,
        7 => self::FIELD_FILE,
        8 => self::FIELD_BUTTON,
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%option_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'field' ], 'required' ],
            [ [ 'name' ], 'string', 'max' => 1024 ],
            [ [ 'field' ], 'string', 'max' => 16 ],
            [ [ 'field' ], 'unique' ],
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
            'field' => 'Поле',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageOptions ()
    {
        return $this->hasMany(PageOption::className(), [ 'option_type_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiteOptions ()
    {
        return $this->hasMany(SiteOption::className(), [ 'option_type_id' => 'id' ]);
    }

}
