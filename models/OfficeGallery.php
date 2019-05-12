<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%office_gallery}}".
 *
 * @property int $id
 * @property int $sort
 * @property string $image
 * @property int $inwidget
 */
class OfficeGallery extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%office_gallery}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort', 'inwidget' ], 'integer' ],
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
            'id'       => 'ID',
            'sort'     => 'Порядок',
            'image'    => 'Изображение',
            'inwidget' => 'Отображать в виджете',
        ];
    }

}
