<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property int $id
 * @property string $name
 * @property string $position
 *
 * @property MenuContent[] $menuContents
 */
class Menu extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'position' ], 'required' ],
            [ [ 'name' ], 'string', 'max' => 1024 ],
            [ [ 'position' ], 'string', 'max' => 32 ],
            [ [ 'position' ], 'unique' ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'       => 'ID',
            'name'     => 'Название',
            'position' => 'Позиция',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuContents ()
    {
        return $this->hasMany(MenuContent::className(), [ 'menu_id' => 'id' ]);
    }

}
