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

        <div class="mfp-hide popup-window wrapper" id="foz-callback">
            <?=
            FormViewWidget::widget([
                'header'        => 'Укажите номер телефона',
                'subheader'     => 'Мы позвоним вам и ответим на все ваши вопросы',
                'formClass'     => CallorderForm::class,
                'submitMessage' => 'Заказать звонок',
            ])
            ?>
        </div>
        
        <div class="mfp-hide popup-window wrapper" id="foz-measure">
            <?=
            FormViewWidget::widget([
                'header'        => 'Закажите бесплатный выезд замерщика',
                'subheader'     => 'и узнайте точную стоимость ремонта квартиры',
                'formClass'     => MeasureForm::class,
                'submitMessage' => 'Заказать звонок',
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

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
