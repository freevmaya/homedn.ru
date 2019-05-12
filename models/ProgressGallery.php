<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%progress_gallery}}".
 *
 * @property int $id
 * @property string $year
 * @property int $sort
 * @property string $header
 * @property string $content
 * @property string $media
 * @property string $video
 */
class ProgressGallery extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%progress_gallery}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort' ], 'integer' ],
            [ [ 'year', 'header' ], 'string', 'max' => 255 ],
            [ [ 'content' ], 'string', 'max' => 2048 ],
            [ [ 'media', 'video' ], 'string', 'max' => 4096 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'      => 'ID',
            'year'    => 'Год',
            'sort'    => 'Порядок',
            'header'  => 'Заголовок',
            'content' => 'Текст',
            'media'   => 'Фото/Обложка для видео (через запятую)',
            'video'   => 'Ссылки на видео (через зяпятую)'
        ];
    }

}
