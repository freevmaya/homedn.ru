<?php

use yii\widgets\Breadcrumbs;
use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\models\MeasureForm;
use app\widgets\SocialsWidget;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;

TemplateAsset::register($this);

/* @var $model app\models\Page */

$this->params['breadcrumbs'] = [ [ 'label' => $model->name ] ];
?>

<section>
    <div class="wrapper">
        <?=
        Breadcrumbs::widget([
            'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [ 'label' => 'Главная', 'url' => '/' ],
        ])
        ?>
    </div>
</section>

<section class="section-1">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header21')) ?></div>
        <div class="map"><?= PageProperty::getValue($model->id, 'map1') ?></div>
        <div class="connect">
            <div class="item">
                <span class="icon"><img src="<?= Yii::$app->params['image_dir_url'] ?>c1.png"></span>
                <span class="cont">
                    <span class="name">Телефон</span>
                    <span class="val"><a href="tel:+<?= preg_replace('/[^0-9]/', '', PageProperty::getValue($model->id, 'contactphone')) ?>"><?= nl2br(PageProperty::getValue($model->id, 'contactphone')) ?></a></span>
                </span>
            </div>
            <div class="item">
                <span class="icon"><img src="<?= Yii::$app->params['image_dir_url'] ?>c2.png"></span>
                <span class="cont">
                    <span class="name">E-mail</span>
                    <span class="val"><a href="mailto:<?= PageProperty::getValue($model->id, 'contactemail') ?>"><?= nl2br(PageProperty::getValue($model->id, 'contactemail')) ?></a></span>
                </span>
            </div>
            <div class="item">
                <span class="icon"><img src="<?= Yii::$app->params['image_dir_url'] ?>c3.png"></span>
                <span class="cont">
                    <span class="name">Адрес</span>
                    <span class="val"><?= nl2br(PageProperty::getValue($model->id, 'contactaddress')) ?></span>
                </span>
            </div>
            <div class="item">
                <span class="icon"><img src="<?= Yii::$app->params['image_dir_url'] ?>c4.png"></span>
                <span class="cont">
                    <span class="name">Мы в социальных сетях</span>
                    <span class="val socials"><?=
                        SocialsWidget::widget([
                            'position' => 'top',
                        ])
                        ?></span>
                </span>
            </div>
        </div>
    </div>
</section>

<section class="section-2">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header22')) ?></div>
        <div class="details">
            <?= PageProperty::getValue($model->id, 'contactdetails') ?>
        </div>
    </div>
</section>

<section class="section-3">
    <div class="wrapper">
        <div class="cont">
            <?=
            FormViewWidget::widget([
                'header'        => nl2br(SiteProperty::getValue('fozmeasureheader')),
                'subheader'     => nl2br(SiteProperty::getValue('fozmeasuresubheader')),
                'formClass'     => MeasureForm::class,
                'submitMessage' => SiteProperty::getValue('fozmeasurecta'),
            ])
            ?>
        </div>
    </div>
</section>

<?=
PageSeoWidget::widget([
    'pageId'   => $model->id,
    'pageSeo'  => $model->pageSeo,
    'pageView' => $this,
])
?>