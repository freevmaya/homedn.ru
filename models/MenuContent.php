<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%menu_content}}".
 *
 * @property int $id
 * @property int $menu_id
 * @property string $name
 * @property string $url
 * @property int $page_id
 * @property int $sort
 * @property int $menu_content_id
 *
 * @property MenuContent $menuContent
 * @property MenuContent[] $menuContents
 * @property Menu $menu
 * @property Page $page
 */
class MenuContent extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%menu_content}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'menu_id', 'page_id', 'sort', 'menu_content_id' ], 'integer' ],
            [ [ 'name' ], 'required' ],
            [ [ 'name', 'url' ], 'string', 'max' => 1024 ],
            [ [ 'menu_content_id' ], 'exist', 'skipOnError' => true, 'targetClass' => MenuContent::className(), 'targetAttribute' => [ 'menu_content_id' => 'id' ] ],
            [ [ 'menu_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => [ 'menu_id' => 'id' ] ],
            [ [ 'page_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => [ 'page_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'              => 'ID',
            'menu_id'         => 'Меню',
            'name'            => 'Название',
            'url'             => 'Url',
            'page_id'         => 'Страница',
            'sort'            => 'Порядок',
            'menu_content_id' => 'Родитель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuContent ()
    {
        return $this->hasOne(MenuContent::className(), [ 'id' => 'menu_content_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuContents ()
    {
        return $this->hasMany(MenuContent::className(), [ 'menu_content_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu ()
    {
        return $this->hasOne(Menu::className(), [ 'id' => 'menu_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage ()
    {
        return $this->hasOne(Page::className(), [ 'id' => 'page_id' ]);
    }

}
