<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio_review}}".
 *
 * @property int $id
 * @property string $header
 * @property int $page_id
 * @property string $video
 * @property string $cover
 * @property int $sort
 *
 * @property Page $page
 */
class PortfolioReview extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%portfolio_review}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'page_id' ], 'required' ],
            [ [ 'page_id', 'sort' ], 'integer' ],
            [ [ 'header', 'video', 'cover' ], 'string', 'max' => 255 ],
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
            'header'  => 'Заголовок',
            'page_id' => 'Объект',
            'video'   => 'Ссылка на видео',
            'cover'   => 'Обложка на видео',
            'sort'    => 'Порядок',
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
