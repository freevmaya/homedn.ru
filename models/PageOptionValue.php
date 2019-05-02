<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%page_option_value}}".
 *
 * @property int $id
 * @property int $page_option_id
 * @property int $page_id
 * @property string $value
 *
 * @property Page $page
 * @property PageOption $pageOption
 */
class PageOptionValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%page_option_value}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_option_id', 'page_id'], 'integer'],
            [['value'], 'string'],
            [['page_option_id', 'page_id'], 'unique', 'targetAttribute' => ['page_option_id', 'page_id']],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
            [['page_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageOption::className(), 'targetAttribute' => ['page_option_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_option_id' => 'Page Option ID',
            'page_id' => 'Page ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageOption()
    {
        return $this->hasOne(PageOption::className(), ['id' => 'page_option_id']);
    }
}
