<?php

namespace app\models;

use Yii;
use app\helpers\Transliteration;

/**
 * This is the model class for table "{{%page_seo}}".
 *
 * @property int $id
 * @property int $page_id
 * @property string $url
 * @property string $h1
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property int $noindex
 *
 * @property Page $page
 */
class PageSeo extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%page_seo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'page_id' ], 'required' ],
            [ [ 'page_id', 'noindex' ], 'integer' ],
            [ [ 'content' ], 'string' ],
            [ [ 'url', 'h1', 'title', 'keywords', 'description' ], 'string', 'max' => 1024 ],
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
            'url'         => 'Url',
            'h1'          => 'H1',
            'title'       => 'Title',
            'keywords'    => 'Keywords',
            'description' => 'Description',
            'content'     => 'Текст',
            'noindex'     => 'Noindex',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage ()
    {
        return $this->hasOne(Page::className(), [ 'id' => 'page_id' ]);
    }

    public function beforeSave ($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this->url) {
                $this->url = Transliteration::url($this->page->name);
                $i         = 0;
                while (Page::find()->alias('p')->joinWith('pageSeo ps', false, 'INNER JOIN')->where([ 'ps.url' => $this->url . ($i ? '-' . $i : ''), 'p.page_id' => $this->page ? $this->page->page_id : null ])->all()) {
                    $i++;
                }
                if ($i)
                    $this->url .= '-' . $i;
            }
            return true;
        }
        return false;
    }

}
