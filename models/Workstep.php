<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%workstep}}".
 *
 * @property int $id
 * @property int $page_id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property int $sort
 *
 * @property Page $page
 */
class Workstep extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%workstep}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'page_id', 'sort' ], 'integer' ],
            [ [ 'name', 'image' ], 'string', 'max' => 255 ],
            [ [ 'description' ], 'string', 'max' => 2048 ],
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
            'name'        => 'Заголовок',
            'image'       => 'Изображение',
            'description' => 'Описание',
            'sort'        => 'Порядок',
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
