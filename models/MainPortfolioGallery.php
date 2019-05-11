<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%main_portfolio_gallery}}".
 *
 * @property int $id
 * @property int $sort
 * @property string $image
 */
class MainPortfolioGallery extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%main_portfolio_gallery}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort' ], 'integer' ],
            [ [ 'image' ], 'required' ],
            [ [ 'image' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'    => 'ID',
            'sort'  => 'Порядок',
            'image' => 'Изображение',
        ];
    }

}
