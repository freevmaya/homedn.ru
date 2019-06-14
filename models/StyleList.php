<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%style_list}}".
 *
 * @property int $id
 * @property int $page_id
 * @property string $name
 * @property int $sort
 * @property string $desc
 *
 * @property Page $page
 * @property StyleListVariant[] $styleListVariants
 */
class StyleList extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%style_list}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'page_id', 'sort' ], 'integer' ],
            [ [ 'name', 'desc' ], 'string', 'max' => 255 ],
            [ [ 'page_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => [ 'page_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'      => 'ID',
            'page_id' => 'Страница',
            'name'    => 'Название',
            'sort'    => 'Порядок',
            'desc'    => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage ()
    {
        return $this->hasOne(Page::className(), [ 'id' => 'page_id' ]);
    }

    public function getStyleListVariants ()
    {
        return $this->hasMany(StyleListVariant::class, [ 'style_list_id' => 'id' ])->orderBy(['sort'=>SORT_ASC]);
    }

}
