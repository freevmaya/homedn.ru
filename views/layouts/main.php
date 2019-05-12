<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\helpers\SiteProperty;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use porcelanosa\magnificPopup\MagnificPopup;
use app\assets\AppAsset;
use app\widgets\MenuWidget;
use app\widgets\FormViewWidget;
use app\widgets\SocialsWidget;
use app\models\CallorderForm;
use app\models\MeasureForm;

AppAsset::register($this);
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
        <?= SiteProperty::getValue('headcode') ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <header>
            <div class="top-hidden">
                <div class="wrapper">
                    <div class="top-hidden-menu">
                        <?=
                        MenuWidget::widget([
                            'menuPosition' => 'tophidden',
                        ])
                        ?>
                    </div>
                    <div class="socials">
                        <div class="sheader">Мы в соц. сетях</div>
                        <?= SocialsWidget::widget() ?>
                    </div>
                </div>
            </div>
            <div class="top-fixed wrapper">
                <div class="logo">
                    <?=
                    Yii::$app->request->getUrl() != Yii::$app->homeUrl ?
                            Html::a(Html::img(Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . SiteProperty::getValue('logo')), 104, 38, 'inset')), '/') :
                            Html::img(Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . SiteProperty::getValue('logo')), 104, 38, 'inset'))
                    ?>
                </div>
                <div class="himenu">
                    <a href="#" class="himenu-open"><img src="<?= Yii::$app->params['image_dir_url'] ?>menu.png"> <span>Меню</span></a>
                </div>
                <div class="main-menu">
                    <?=
                    MenuWidget::widget([
                        'menuPosition' => 'mainmenu',
                    ])
                    ?>
                </div>
                <div class="top-phone">
                    <div class="num">
                        <a href="tel:+<?= preg_replace('/[^0-9]/', '', SiteProperty::getValue('phone')) ?>"><?= SiteProperty::getValue('phone') ?></a>
                    </div>
                    <div class="foz">
                        <a href="#foz-callback" class="popup-inline">Обратный звонок</a>
                    </div>
                </div>
            </div>
        </header>

        <?= $content ?>

        <footer>
            <div class="wrapper">
                <div class="top">
                    <div class="h"><?= nl2br(SiteProperty::getValue('footercta')) ?></div>
                    <a href="<?= SiteProperty::getValue('footerlinkurl') ?>" class="popup-inline"><?= SiteProperty::getValue('footerlinktext') ?></a>
                </div>

                <div class="footer-menu">
                    <div class="left">
                        <?= MenuWidget::widget([ 'menuPosition' => 'footermain' ]) ?>
                    </div>
                    <div class="center">
                        <div class="h"><?= SiteProperty::getValue('footermenu2header') ?></div>
                        <?= MenuWidget::widget([ 'menuPosition' => 'footerrepair' ]) ?>
                    </div>
                    <div class="right">
                        <div class="h"><?= SiteProperty::getValue('footermenu3header') ?></div>
                        <?= MenuWidget::widget([ 'menuPosition' => 'footerworks' ]) ?>
                    </div>
                </div>

                <div class="bottom">
                    <div class="left">
                        <div class="social-header">
                            <img src="<?= Yii::$app->params['image_dir_url'] ?>social-gift.png">
                            <span><?= SiteProperty::getValue('footersocialheader') ?></span>
                        </div>
                        <?=
                        SocialsWidget::widget([
                            'position' => 'footer',
                        ])
                        ?>
                    </div>
                    <div class="right">
                        <?= nl2br(SiteProperty::getValue('footerwork')) ?>
                    </div>
                </div>


                <div class="copyright">
                    <div class="sitemap"><?= Html::a('Карта сайта', SiteProperty::getValue('sitemaplink')) ?></div>
                    <?= SiteProperty::getValue('copyright') ?>
                </div>
            </div>
        </footer>

        <div class="mfp-hide popup-window wrapper" id="foz-callback">
            <?=
            FormViewWidget::widget([
                'header'        => nl2br(SiteProperty::getValue('fozcallheader')),
                'subheader'     => nl2br(SiteProperty::getValue('fozcallsubheader')),
                'formClass'     => CallorderForm::class,
                'submitMessage' => SiteProperty::getValue('fozcallcta'),
            ])
            ?>
        </div>

        <div class="mfp-hide popup-window wrapper" id="foz-measure">
            <?=
            FormViewWidget::widget([
                'header'        => nl2br(SiteProperty::getValue('fozmeasureheader')),
                'subheader'     => nl2br(SiteProperty::getValue('fozmeasuresubheader')),
                'formClass'     => MeasureForm::class,
                'submitMessage' => SiteProperty::getValue('fozmeasurecta'),
            ])
            ?>
        </div>

        <?=
        MagnificPopup::widget([
            'target'  => '.popup-inline',
            'options' => [
                'type' => 'inline',
            ],
        ])
        ?>

        <?=
        MagnificPopup::widget([
            'target'  => '.popup-video',
            'options' => [
                'type' => 'iframe',
            ],
        ])
        ?>
        
        <?=
        MagnificPopup::widget([
            'target'  => '.popup-image',
            'options' => [
                'type' => 'image',
            ],
        ])
        ?>

        <div id="top"><span class="image"><?= Html::img(Yii::$app->params['image_dir_url'] . 'top.png') ?></span></div>

        <?= SiteProperty::getValue('bodycode') ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
