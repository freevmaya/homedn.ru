<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%work_progress}}".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $text
 * @property string $link
 * @property string $url
 * @property int $sort
 */
class WorkProgress extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%work_progress}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort' ], 'integer' ],
            [ [ 'name', 'image', 'text', 'link', 'url' ], 'string', 'max' => 255 ],
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
            'image' => 'Изображение',
            'text'  => 'Описание',
            'link'  => 'Текст ссылки',
            'url'   => 'Ссылка',
            'sort'  => 'Порядок',
        ];
    }

}
