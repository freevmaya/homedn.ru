<?php

namespace app\components\page;

use Yii;
use yii\web\UrlRuleInterface;
use app\models\Page;
use app\models\PageSeo;
use app\helpers\SiteProperty;

class PageUrl implements UrlRuleInterface
{

    /**
     * @inheritdoc
     */
    public function createUrl ($manager, $route, $params)
    {
        $url = '/';

        if ($route == 'site/frontend') {
            if ($params['id'] == Yii::$app->params['homePageId']) {
                unset($params['id']);
                return $url . ($params ? '?' . http_build_query($params) : '');
            }
            if ($params['id'] == SiteProperty::getValue('calcpageid')) {
                if (isset($params['k']) && $params['k']) {
                    $model = Page::find()->where([ 'id' => $params['id'] ])->one();
                    $url   .= $model->pageSeo->url . '/' . $params['k'] . '/';
                    unset($params['id']);
                    unset($params['k']);
                    return $url . ($params ? '?' . http_build_query($params) : '');
                }
            }
            $model = Page::find()->where([ 'id' => $params['id'] ])->one();
            if ($model) {
                $parentPage = $model->page_id;
                while ($parentPage) {
                    $parent     = Page::findOne($parentPage);
                    $url        = $parent ? '/' . $parent->pageSeo->url . $url : $url;
                    $parentPage = $parent ? $parent->page_id : false;
                }
                $url .= $model->pageSeo->url . '/';
                unset($params['id']);
                return $url . ($params ? '?' . http_build_query($params) : '');
            }
        }
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
            } else {
                $parent   = null;
                $page_id  = false;
                $calcPage = false;
                $calcKey  = false;
                foreach ($_path as $p) {
                    if ($page = PageSeo::find()->joinWith('page p', false, 'INNER JOIN')->where([ 'url' => $p, 'p.page_id' => $parent, 'p.status' => 1 ])->one()) {
                        $page_id = $page->page_id;
                        $parent  = $page->page_id;

                        if ($page_id == SiteProperty::getValue('calcpageid')) {
                            $calcPage = true;
                        }
                        
                    } else {

                        if ($calcPage) {
                            return [
                                'site/frontend',
                                [
                                    'id' => $page_id,
                                    'k'  => $p,
                                ],
                            ];
                        }

                        $page_id = false;
                        break;
                    }
                }
                if ($page_id) {
                    return [
                        'site/frontend',
                        [
                            'id' => $page_id,
                        ],
                    ];
                }
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
