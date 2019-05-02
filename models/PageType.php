<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%page_type}}".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $template_id
 *
 * @property Page[] $pages
 * @property Template $template
 */
class PageType extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%page_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'code' ], 'required', 'message' => '{attribute} не может быть пустым' ],
            [ [ 'template_id' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 64 ],
            [ [ 'code' ], 'string', 'max' => 32 ],
            [ [ 'code' ], 'unique' ],
            [ [ 'template_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Template::className(), 'targetAttribute' => [ 'template_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'          => 'ID',
            'name'        => 'Наименование',
            'code'        => 'Код',
            'template_id' => 'Шаблон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages ()
    {
        return $this->hasMany(Page::className(), [ 'page_type_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate ()
    {
        return $this->hasOne(Template::className(), [ 'id' => 'template_id' ]);
    }

}
