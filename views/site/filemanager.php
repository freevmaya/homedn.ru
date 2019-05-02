<?php
/* @var $this yii\web\View */

use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;

$this->title = 'Файловый менеджер - Администрирование - ' . Yii::$app->name;
?>
<div class="site-index">


    <div class="body-content">

        <?=
        ElFinder::widget([
            'language'         => 'ru',
            'controller'       => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
//    'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории 
//    'filter'           => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'callbackFunction' => new JsExpression('function(file, id){}'), // id - id виджета
            'containerOptions' => [
                'style' => 'height: 700px;',
            ],
        ])
        ?>

    </div>
</div>
