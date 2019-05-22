<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lending_list}}".
 *
 * @property int $id
 * @property int $page_id
 * @property string $image
 * @property string $name
 * @property string $desc
 * @property string $text
 * @property int $sort
 * @property int $list_number 
 *
 * @property Page $page
 */
class LendingList extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%lending_list}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'page_id', 'sort', 'list_number' ], 'integer' ],
            [ [ 'image', 'name', 'desc' ], 'string', 'max' => 255 ],
            [ [ 'text' ], 'string', 'max' => 2048 ],
            [ [ 'page_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => [ 'page_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'          => 'ID',
            'page_id'     => 'Страница',
            'image'       => 'Изображение',
            'name'        => 'Название',
            'desc'        => 'Примечание',
            'text'        => 'Описание',
            'sort'        => 'Порядок',
            'list_number' => 'Индекс списка',
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
