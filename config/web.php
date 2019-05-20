<?php

use himiklab\sitemap\behaviors\SitemapBehavior;

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

$config = [
    'id'            => 'basic',
    'name'          => 'Home Remont',
    'language'      => 'ru',
    'basePath'      => dirname(__DIR__),
    'bootstrap'     => [ 'assetManager', 'log' ],
    'aliases'       => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'    => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7twvG-ujtcWffSQ7k8kbLEwiJ77ZEn9f',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ],
                ],
            ],
        ],
        'db'           => $db,
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                /* [
                  'pattern' => 'yandex-market.yml',
                  'route'   => 'YandexMarketYml/default/index',
                  'suffix'  => ''
                  ], */
                [
                    'pattern' => 'sitemap.xml',
                    'route'   => 'sitemap/default/index',
                    'suffix'  => ''
                ],
                'admin'                                                       => 'site/admin',
                'ajax/<action>'                                               => 'ajax/<action>',
                'admin/file-manager'                                          => 'site/file-manager',
                'admin/<controller>'                                          => '<controller>/index',
                'admin/<controller>/<action:index|update|create|delete|view>' => '<controller>/<action>',
                [
                    'class' => 'app\components\page\PageUrl',
                ],
                '<action>'                                                    => 'site/<action>',
            ],
        ],
        'imageresize'  => [
            'class'        => 'noam148\imageresize\ImageResize',
            //path relative web folder. In case of multiple environments (frontend, backend) add more paths 
            'cachePath'    => [ 'assets/images' ],
            //use filename (seo friendly) for resized images else use a hash
            'useFilename'  => true,
            //show full url (for example in case of a API)
            'absoluteUrl'  => false,
            'imageQuality' => 90,
        ],
        'assetManager' => [
            'linkAssets'      => true,
            'appendTimestamp' => true,
        ],
    ],
    'modules'       => [
        'sitemap' => [
            'class'       => 'himiklab\sitemap\Sitemap',
            'models'      => [
                'app\models\Page',
            ],
            'enableGzip'  => true,
            'cacheExpire' => 1,
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class'            => 'mihaildev\elfinder\Controller',
            'access'           => [ '@' ],
            'disabledCommands' => [ 'netmount' ],
            'roots'            => [
                [
                    'baseUrl'  => '@web',
                    'basePath' => '@webroot',
                    'path'     => 'uploads',
                    'name'     => 'Uploads',
                ],
            ],
        ],
    ],
    'params'        => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
