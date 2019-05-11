<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%youtube_video}}".
 *
 * @property int $id
 * @property string $link
 * @property int $sort
 * @property string $cover
 */
class YoutubeVideo extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%youtube_video}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'link' ], 'required' ],
            [ [ 'sort' ], 'integer' ],
            [ [ 'link', 'cover' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'    => 'ID',
            'link'  => 'Ссылка',
            'sort'  => 'Порядок',
            'cover' => 'Обложка',
        ];
    }

}
