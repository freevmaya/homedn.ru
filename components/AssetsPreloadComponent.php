<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;
use yii\web\Application;
use yii\web\Response;
use yii\web\View;

/**
 * Description of AssetsPreloadComponent
 *
 * @author stepanov
 */
class AssetsPreloadComponent extends Component implements BootstrapInterface
{

    public $enabled    = true;
    protected $cssTags = [];

    public function bootstrap ($app)
    {
        if ($app instanceof Application) {
            $app->view->on(View::EVENT_END_PAGE, function(Event $e)
            {
                /**
                 * @var $view View
                 */
                $view = $e->sender;
                if ($this->enabled && $view instanceof View && \Yii::$app->response->format == Response::FORMAT_HTML && !\Yii::$app->request->isAjax) {
                    $this->_preloadCss($view);
                    $view->on(View::EVENT_END_BODY, function(Event $e)
                    {
                        foreach ($this->cssTags as $fileTag)
                            echo $fileTag;
                    });
                    
//                    $view->
                }
            });
//            $app->view->on(View::EVENT_END_BODY, function(Event $e)
//            {
//                foreach ($this->cssTags as $fileTag)
//                    echo $fileTag;
//            });
        }

    }

    protected function _preloadCss (View $view)
    {
        if ($view->cssFiles) {
            foreach ($view->cssFiles as $fileCode => $fileTag) {
                $view->registerLinkTag([ 'rel' => 'preload', 'href' => $fileCode, 'as' => 'style', 'id' => explode('.', basename($fileCode))[0] ]);
//                unset($view->cssFiles[$fileCode]);
//                $this->cssTags[] = $fileTag;
            }
//            $view->on(View::EVENT_END_BODY, function(Event $e)
//            {
//                echo '<div>wihberyufvrejyfveyfegfbrghfbhjf</div>';
//                foreach ($this->cssTags as $fileTag)
//                    echo $fileTag;
//            });
        }

    }

}
