<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use himiklab\sitemap\behaviors\SitemapBehavior;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property int $id
 * @property string $name
 * @property int $sort
 * @property int $page_type_id
 * @property int $page_id
 * @property int $template_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MenuContent[] $menuContents
 * @property Page $page
 * @property Page[] $pages
 * @property PageType $pageType
 * @property Template $template
 * @property PageOptionValue[] $pageOptionValues
 * @property PageOption[] $pageOptions
 * @property PageSeo $pageSeo
 * @property PortfolioReview[] $portfolioReviews
 * @property PortfolioGalleries[] $portfolioGalleries 
 */
class Page extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%page}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors ()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
            'sitemap'     => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model)
                {
                    /** @var \yii\db\ActiveQuery $model */
                    $model
                            ->select([ 'updated_at' ])
                            ->joinWith('pageSeo ps', false, 'LEFT JOIN')
                            ->andWhere([ 'status' => 1, 'ps.noindex' => null ]);
                },
                'dataClosure' => function ($model)
                {
                    /** @var self $model */
                    return [
                        'loc'        => Url::to([ 'site/frontend', 'id' => $model->id ], true),
                        'lastmod'    => $model->updated_at,
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority'   => 0.8,
                    ];
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'sort', 'page_type_id', 'page_id', 'template_id', 'status', 'created_at', 'updated_at' ], 'integer' ],
            [ [ 'page_type_id' ], 'required' ],
            [ [ 'name' ], 'string', 'max' => 1024 ],
            [ [ 'page_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Page::class, 'targetAttribute' => [ 'page_id' => 'id' ] ],
            [ [ 'page_type_id' ], 'exist', 'skipOnError' => true, 'targetClass' => PageType::class, 'targetAttribute' => [ 'page_type_id' => 'id' ] ],
            [ [ 'template_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Template::class, 'targetAttribute' => [ 'template_id' => 'id' ] ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id'           => 'ID',
            'name'         => 'Название',
            'sort'         => 'Порядок',
            'page_type_id' => 'Тип страницы',
            'page_id'      => 'Родитель',
            'template_id'  => 'Шаблон',
            'status'       => 'Статус',
            'created_at'   => 'Created At',
            'updated_at'   => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuContents ()
    {
        return $this->hasMany(MenuContent::class, [ 'page_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage ()
    {
        return $this->hasOne(Page::class, [ 'id' => 'page_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages ()
    {
        return $this->hasMany(Page::class, [ 'page_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageType ()
    {
        return $this->hasOne(PageType::class, [ 'id' => 'page_type_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate ()
    {
        return $this->hasOne(Template::class, [ 'id' => 'template_id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageOptionValues ()
    {
        return $this->hasMany(PageOptionValue::class, [ 'page_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageOptions ()
    {
        return $this->hasMany(PageOption::class, [ 'id' => 'page_option_id' ])->viaTable('{{%page_option_value}}', [ 'page_id' => 'id' ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageSeo ()
    {
        return $this->hasOne(PageSeo::class, [ 'page_id' => 'id' ]);
    }

    public function getPortfolioReviews ()
    {
        return $this->hasMany(PortfolioReview::class, [ 'page_id' => 'id' ]);
    }

    public function getPortfolioGalleries ()
    {
        return $this->hasMany(PortfolioGallery::class, [ 'page_id' => 'id' ]);
    }

}
