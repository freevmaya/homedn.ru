<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio_gallery}}".
 *
 * @property int $id
 * @property int $gallery_type
 * @property int $page_id
 * @property int $sort
 * @property string $image
 *
 * @property Page $page
 */
class PortfolioGallery extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%portfolio_gallery}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'gallery_type', 'page_id', 'image' ], 'required' ],
            [ [ 'gallery_type', 'page_id', 'sort' ], 'integer' ],
            [ [ 'image' ], 'string', 'max' => 255 ],
            [ [ 'page_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => [ 'page_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'           => 'ID',
            'gallery_type' => 'Тип галереи',
            'page_id'      => 'Страница',
            'sort'         => 'Порядок',
            'image'        => 'Изображение',
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
