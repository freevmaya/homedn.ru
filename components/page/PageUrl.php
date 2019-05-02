<?php

namespace app\components\page;

use app\models\Page;
use Yii;
use yii\web\UrlRuleInterface;

class PageUrl implements UrlRuleInterface
{

    /**
     * @inheritdoc
     */
    public function createUrl ($manager, $route, $params)
    {
        $url = '/';
        if ($route == 'site/article-section') {
            $model = null;
            if (isset($params['id'])) {
                $model = \app\models\ArticleSection::findOne($params['id']);
                if ($model) {
                    $blogPage = Page::findOne(\Yii::$app->params['blogPageId']);
                    $url      .= $blogPage->url . '/' . $model->url . '/';
                    unset($params['id']);

                    return $url . ($params ? '?' . http_build_query($params) : '');
                }
            }
        }
        if ($route == 'site/article') {
            $model = null;
            if (isset($params['id'])) {
                $model = \app\models\Article::findOne($params['id']);
                if ($model) {
                    $articleSection = \app\models\ArticleSection::findOne($model->section);
                    $blogPage       = Page::findOne(\Yii::$app->params['blogPageId']);
                    $url            .= $blogPage->url . '/' . $articleSection->url . '/' . $model->url . '/';
                    unset($params['id']);

                    return $url . ($params ? '?' . http_build_query($params) : '');
                }
            }
        }
        if ($route == 'site/service') {
            $model = null;
            if (isset($params['id'])) {
                $model = \app\models\Service::findOne($params['id']);
                if ($model) {
//                    $articleSection = \app\models\ArticleSection::findOne($model->section);
                    $servicePage = Page::findOne(\Yii::$app->params['servicePageId']);
                    $url         .= $servicePage->url . '/' . $model->url . '/';
                    unset($params['id']);

                    return $url . ($params ? '?' . http_build_query($params) : '');
                }
            }
        }
        if ($route == 'site/portfolio') {
            $model = null;
            if (isset($params['id'])) {
                $model = \app\models\PortfolioElement::findOne($params['id']);
                if ($model) {
                    $portfolioPage = Page::findOne(\Yii::$app->params['portfolioPageId']);
                    $url           .= $portfolioPage->url . '/' . $model->url . '/';
                    unset($params['id']);

                    return $url . ($params ? '?' . http_build_query($params) : '');
                }
            }
        }
        if ($route == 'site/product-category') {
            $model = null;
            if (isset($params['id'])) {
                $model = \app\models\ProductCategory::getDb()->cache(function($db) use ($params)
                {
                    return \app\models\ProductCategory::find()->where([ 'id' => $params['id'], 'status' => 1 ])->one();
                });
                if ($model) {
//                    $catalogPage = Page::findOne(\Yii::$app->params['catalogPageId']);
                    $url .= /* $catalogPage->url . '/' . */ $model['url'] . '/';
                    unset($params['id']);
                    if (isset($params['filterId'])) {
                        if ($filterValue = \app\models\ProductCategoryFilterValue::findOne($params['filterId'])) {
                            $url .= $filterValue->url . '/';
                            unset($params['filterId']);
                        }
                    }

                    return $url . ($params ? '?' . http_build_query($params) : '');
                }
            }
        }

        if ($route == 'site/product') {
            $model = null;
            if (isset($params['id'])) {
                $model = \app\models\Product::getDb()->cache(function($db) use ($params)
                {
                    return \app\models\Product::find()->where([ 'id' => $params['id'], 'status' => 1 ])->one();
                });
                if ($model) {
                    $url .= 'p' . $model->partnumber . '/';
                    unset($params['id']);
                    return $url . ($params ? '?' . http_build_query($params) : '');
                }
            }
        }

        if ($route == 'site/frontend') {
            if ($params['id'] == Yii::$app->params['homePageId']) {
                unset($params['id']);
                return $url . ($params ? '?' . http_build_query($params) : '');
            }
            $model = Page::find()->where([ 'id' => $params['id'] ])->one();
            if ($model) {
                $parentPage = $model->page_id;
                while ($parentPage) {
                    $parent     = Page::findOne($parentPage);
                    $url        .= $parent ? $parent->pageSeo->url . '/' : '';
                    $parentPage = $parent ? $parent->page_id : false;
                }
                $url .= $model->pageSeo->url . '/';
                unset($params['id']);
                return $url . ($params ? '?' . http_build_query($params) : '');
            }
        }
//        if( $route == 'site/news' )
//        {
//            if( isset($params['id']) )
//            {
//                $model = \app\models\News::findOne($params['id']);
//                if( $model )
//                {
//                    $url .= 'news/' . $model->url . '/';
//                    unset($params['id']);
//                    return $url . ($params ? '?' . http_build_query($params) : '');
//                }
//            }
//            else
//                return $url . 'news/' . ($params ? '?' . http_build_query($params) : '');
//        }
//        if( $route == 'site/article' )
//        {
//            if( isset($params['id']) )
//            {
//                $model = \app\models\Article::findOne($params['id']);
//                if( $model )
//                {
//                    $url .= 'article/' . $model->url . '/';
//                    unset($params['id']);
//                    return $url . ($params ? '?' . http_build_query($params) : '');
//                }
//            }
//            else
//                return $url . 'article/' . ($params ? '?' . http_build_query($params) : '');
//        }
//        if( $route == 'site/search' )
//            return $url . 'search/' . ($params ? '?' . http_build_query($params) : '');
//        if( $route == 'site/specials' )
//        {
//            if( isset($params['id']) )
//            {
//                $model = \app\models\Specials::findOne($params['id']);
//                if( $model )
//                {
//                    $url .= 'specials/' . $model->url . '/';
//                    unset($params['id']);
//                    return $url . ($params ? '?' . http_build_query($params) : '');
//                }
//            }
//        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function parseRequest ($manager, $request)
    {
        $_path   = $request->getPathInfo();
        $_params = $request->getQueryParams();

        if ($_path) {
            $_path = explode('/', trim($_path, '/'));

            if (count($_path) == 1) {
                $page = Page::find()->joinWith('pageSeo ps', true, 'INNER JOIN')->where([ 'ps.url' => $_path[0] ])->one();
                if ($page)
                    return [
                        'site/frontend',
                        [
                            'id' => $page->id,
                        ],
                    ];
            }
        } else {
            return [
                'site/frontend',
                [
                    'id' => Yii::$app->params['homePageId'],
                ],
            ];
        }
        return false;
    }

}
