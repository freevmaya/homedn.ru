<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%social}}".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $sort
 * @property string $icon_top
 * @property string $icon_foz
 * @property string $icon_footer
 */
class Social extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%social}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'url' ], 'required' ],
            [ [ 'sort' ], 'integer' ],
            [ [ 'name', 'url', 'icon_top', 'icon_foz', 'icon_footer' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'          => 'ID',
            'name'        => 'Название',
            'url'         => 'Url',
            'sort'        => 'Порядок',
            'icon_top'    => 'Иконка для верхнего меню',
            'icon_foz'    => 'Иконка под форму заявки',
            'icon_footer' => 'Иконка в подвал',
        ];
    }

}
