<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%page_option}}".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $default_value
 * @property int $sort
 * @property int $template_id
 * @property int $option_type_id
 *
 * @property OptionType $optionType
 * @property Template $template
 * @property PageOptionValue[] $pageOptionValues
 * @property Page[] $pages
 */
class PageOption extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%page_option}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'name', 'code' ], 'required' ],
            [ [ 'default_value' ], 'string' ],
            [ [ 'sort', 'template_id', 'option_type_id' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 255 ],
            [ [ 'code' ], 'string', 'max' => 64 ],
            [ [ 'code' ], 'unique' ],
            [ [ 'option_type_id' ], 'exist', 'skipOnError' => true, 'targetClass' => OptionType::className(), 'targetAttribute' => [ 'option_type_id' => 'id' ] ],
            [ [ 'template_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Template::className(), 'targetAttribute' => [ 'template_id' => 'id' ] ],
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
            'default_value'  => 'Значение по умолчанию',
            'sort'           => 'Порядок',
            'template_id'    => 'Шаблон',
            'option_type_id' => 'Тип',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionType ()
    {
        return $this->hasOne(OptionType::className(), [ 'id' => 'option_type_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate ()
    {
        return $this->hasOne(Template::className(), [ 'id' => 'template_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageOptionValues ()
    {
        return $this->hasMany(PageOptionValue::className(), [ 'page_option_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages ()
    {
        return $this->hasMany(Page::className(), [ 'id' => 'page_id' ])->viaTable('{{%page_option_value}}', [ 'page_option_id' => 'id' ]);
    }

    public function getValues ()
    {
        return ArrayHelper::map($this->pageOptionValues, 'page_id', 'value');
    }

}
