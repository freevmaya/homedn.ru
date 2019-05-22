<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%style_list}}".
 *
 * @property int $id
 * @property int $page_id
 * @property string $image
 * @property string $name
 * @property int $sort
 * @property string $desc
 * @property string $color1
 * @property string $color2
 * @property string $color3
 *
 * @property Page $page
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
            [ [ 'image', 'name', 'desc', 'color1', 'color2', 'color3' ], 'string', 'max' => 255 ],
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
            'image'   => 'Изображение',
            'name'    => 'Название',
            'sort'    => 'Порядок',
            'desc'    => 'Описание',
            'color1'  => 'Цвет1',
            'color2'  => 'Цвет2',
            'color3'  => 'Цвет3',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage ()
    {
        return $this->hasOne(Page::className(), [ 'id' => 'page_id' ]);
    }

}
