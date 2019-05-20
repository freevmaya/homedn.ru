<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl'   => [ '/site/admin' ],
                'options'    => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            echo Nav::widget([
                'options' => [ 'class' => 'navbar-nav navbar-right' ],
                'items'   => [
                    [
                        'label' => 'Главная', 'url'   => [ '/site/admin' ]
                    ],
                    [
                        'label' => 'Контент', 'items' => [
                            [ 'label' => 'Общее', 'url' => [ '/site-option-value/index' ] ],
                            [ 'label' => 'Страницы', 'url' => [ '/page/index', 'page_type' => 'page' ] ],
                            [ 'label' => 'Меню', 'url' => [ '/menu/index' ] ],
                            [ 'label' => 'Социальные сети', 'url' => [ '/social/index' ] ],
                            [ 'label' => 'Команда', 'url' => [ '/employee/index' ] ],
                            [ 'label' => 'Цены', 'url' => [ '/price-caption/index' ] ],
                            [ 'label'       => 'Портфолио >', 'items'       => [
                                    [ 'label' => 'Разделы', 'url' => [ '/page/index', 'page_type' => 'portfolio-section' ] ],
                                    [ 'label' => 'Объекты', 'url' => [ '/page/index', 'page_type' => 'portfolio-element' ] ],
                                    [ 'label' => 'Отзывы', 'url' => [ '/portfolio-review/index' ] ],
                                ],
                                'options'     => [
                                    'class' => 'dropdown',
                                    'role'  => 'navigation',
                                ],
                                'linkOptions' => [
                                    'class'       => 'dropdown-toggle',
                                    'data-toggle' => 'dropdown'
                                ],
                            ],
                            [ 'label' => 'Блог', 'items' => [
                                    [ 'label' => 'Разделы', 'url' => [ '/page/index', 'page_type' => 'article-section' ] ],
                                    [ 'label' => 'Статьи', 'url' => [ '/page/index', 'page_type' => 'article-element' ] ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Заявки', 'items' => [
                            [ 'label' => 'Заказ звонка', 'url' => [ '/callorder/index' ] ],
                            [ 'label' => 'Вызов замерщика', 'url' => [ '/measure/index' ] ],
                            [ 'label' => 'Вызов замерщика из калькулятора', 'url' => [ '/calc-request/index' ] ],
                        ],
                    ],
                    [
                        'label' => 'Настройки калькулятора', 'items' => [
                            [ 'label' => 'Базовые параметры', 'url' => [ '/calc-base-price/index' ] ],
                            [ 'label' => 'Комнаты', 'url' => [ '/calc-room/index' ] ],
                            [ 'label' => 'Группы элементов', 'url' => [ '/calc-component-group/index' ] ],
                            [ 'label' => 'Элементы', 'url' => [ '/calc-component-element/index' ] ],
                            [ 'label' => 'Готовые наборы', 'url' => [ '/calc-collect/index' ] ],
                            [ 'label' => 'Элементы в комплекте', 'url' => [ '/calc-complect-content/index' ] ],
                        ],
                    ],
                    [
                        'label' => 'Настройки', 'items' => [
                            [ 'label' => 'Файловый менеджер', 'url' => [ '/site/file-manager' ] ],
                            [ 'label' => 'Свойства сайта', 'url' => [ '/site-option/index' ] ],
                            [ 'label' => 'Типы контента', 'url' => [ '/page-type/index' ] ],
                            [ 'label' => 'Типы данных', 'url' => [ '/option-type/index' ] ],
                            [ 'label' => 'Атрибуты', 'url' => [ '/page-option/index' ] ],
                            [ 'label' => 'Шаблоны', 'url' => [ '/template/index' ] ],
                            [ 'label' => 'Пользователи', 'url' => [ '/user/index' ] ],
                        ]
                    ],
                    (
                    '<li>'
                    . Html::beginForm([ '/site/logout' ], 'post')
                    . Html::submitButton(
                            'Выйти (' . Yii::$app->user->identity->username . ')', [ 'class' => 'btn btn-link logout' ]
                    )
                    . Html::endForm()
                    . '</li>'
                    )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink' => [ 'label' => 'Главная', 'url' => [ '/site/admin' ] ],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Home Remont <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::$app->params['cms'] ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
