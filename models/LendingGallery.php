<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lending_gallery}}".
 *
 * @property int $id
 * @property int $page_id
 * @property int $sort
 * @property string $image
 *
 * @property Page $page
 */
class LendingGallery extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%lending_gallery}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'page_id', 'sort' ], 'integer' ],
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
            'id'      => 'ID',
            'page_id' => 'Страница',
            'sort'    => 'Порядок',
            'image'   => 'Изображение',
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
