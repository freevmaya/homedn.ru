<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\helpers\SiteProperty;
use porcelanosa\magnificPopup\MagnificPopup;
use app\assets\AppAsset;
use app\widgets\MenuWidget;
use app\widgets\FormViewWidget;
use app\widgets\SocialsWidget;
use app\models\CallorderForm;
use app\models\MeasureForm;
use yii\widgets\Breadcrumbs;

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
            <div class="wrapper">
                <div class="logo">
                    <?=
                    Yii::$app->request->getUrl() != Yii::$app->homeUrl ?
                            Html::a(Html::img(Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . SiteProperty::getValue('logo')), 104, 38, 'inset')), '/') :
                            Html::img(Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . SiteProperty::getValue('logo')), 104, 38, 'inset'))
                    ?>
                </div>
                <?=
                Breadcrumbs::widget([
                    'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink' => [ 'label' => 'Главная', 'url' => '/' ],
                ])
                ?>
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

        <?= SiteProperty::getValue('bodycode') ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
