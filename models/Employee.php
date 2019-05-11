<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property int $id
 * @property string $fio
 * @property string $place
 * @property string $photo1
 * @property string $photo2
 * @property string $video
 * @property int $sort
 * @property int $sort_slide
 */
class Employee extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%employee}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort', 'sort_slide' ], 'integer' ],
            [ [ 'fio', 'place', 'photo1', 'photo2', 'video' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'         => 'ID',
            'fio'        => 'Имя',
            'place'      => 'Должность',
            'photo1'     => 'Основное фото',
            'photo2'     => 'Фото на главной',
            'video'      => 'Видео',
            'sort'       => 'Порядок',
            'sort_slide' => 'Порядок в слайдере',
        ];
    }

}
