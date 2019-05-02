<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%template}}".
 *
 * @property int $id
 * @property string $path_front
 *
 * @property Page[] $pages
 * @property PageOption[] $pageOptions
 * @property PageType[] $pageTypes
 */
class Template extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%template}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'path_front' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'         => 'ID',
            'path_front' => 'Файл шаблона',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages ()
    {
        return $this->hasMany(Page::className(), [ 'template_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageOptions ()
    {
        return $this->hasMany(PageOption::className(), [ 'template_id' => 'id' ])->orderBy([ 'sort' => SORT_ASC ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageTypes ()
    {
        return $this->hasMany(PageType::className(), [ 'template_id' => 'id' ]);
    }

}
