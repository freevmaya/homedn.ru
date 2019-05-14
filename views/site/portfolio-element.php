<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\widgets\PortfolioSectionMenuWidget;
use app\widgets\PortfolioElementNavigationWidget;
use porcelanosa\magnificPopup\MagnificPopup;
use app\models\MeasureForm;
use app\widgets\FormViewWidget;
use app\widgets\PortfolioElementRelativeWidget;
use app\widgets\PageSeoWidget;

TemplateAsset::register($this);

/* @var $model app\models\Page */
?>

<section class="section-1">
    <div class="wrapper">
        <?=
        PortfolioSectionMenuWidget::widget([
            'pageId' => $model->page_id,
        ])
        ?>
        <?=
        PortfolioElementNavigationWidget::widget([
            'pageId' => $model->id,
        ])
        ?>
    </div>
</section>

<section class="section-2">
    <div class="wrapper">
        <div class="element-top">
            <div class="head" data-back="<?= PageProperty::getValue($model->id, 'image6') ?>">
                <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header30')) ?></div>
                <div class="line"></div>
                <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header31')) ?></div>
            </div>
        </div>
    </div>
</section>

<? if ($model->portfolioReviews) { ?>
    <section class="section-video">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header32')) ?></div>
            <div class="video">
                <a href="<?= $model->portfolioReviews[0]->video ?>" class="popup-video video-impulse" data-back="<?= Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . $model->portfolioReviews[0]->cover), 641, 360) ?>"></a>
            </div>
        </div>
    </section>
<? } ?>

<?
$gallery1 = [];
$gallery2 = [];
if ($model->portfolioGalleries) {
    foreach ($model->portfolioGalleries as $photo) {
        if ($photo->gallery_type == 1) {
            $gallery1[] = $photo;
        } else {
            $gallery2[] = $photo;
        }
    }
}

if ($gallery1) {
    ?>
    <section class="section-gallery">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header33')) ?></div>
            <ul class="portfolio-gallery portfolio-gallery-1">
                <? foreach ($gallery1 as $photo) {
                    ?><li><a href="<?= $photo->image ?>"><img src="<?= Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . $photo->image), 292, 194) ?>"></a></li><? }
                ?>
            </ul>
        </div>
    </section>
    <?
    echo MagnificPopup::widget([
        'target'  => '.portfolio-gallery-1',
        'options' => [
            'delegate' => 'a',
            'type'     => 'image',
            'gallery'  => [
                'enabled'  => true,
                'tCounter' => '<span class="mfp-counter">%curr% из %total%</span>'
            ]
        ]
    ]);
}

if ($video = PageProperty::getValue($model->id, 'video5link')) {
    ?>
    <section class="section-video">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header34')) ?></div>
            <div class="video">
                <a href="<?= $video ?>" class="popup-video video-impulse" data-back="<?= Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . PageProperty::getValue($model->id, 'video5image')), 641, 360) ?>"></a>
            </div>
        </div>
    </section>
    <?
}

if ($gallery2) {
    ?>
    <section class="section-gallery">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header35')) ?></div>
            <ul class="portfolio-gallery portfolio-gallery-2">
                <? foreach ($gallery1 as $photo) {
                    ?><li><a href="<?= $photo->image ?>"><img src="<?= Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . $photo->image), 292, 194) ?>"></a></li><? }
                ?>
            </ul>
        </div>
    </section>
    <?
    echo MagnificPopup::widget([
        'target'  => '.portfolio-gallery-2',
        'options' => [
            'delegate' => 'a',
            'type'     => 'image',
            'gallery'  => [
                'enabled'  => true,
                'tCounter' => '<span class="mfp-counter">%curr% из %total%</span>'
            ]
        ]
    ]);
}

if ($video = PageProperty::getValue($model->id, 'video6link')) {
    ?>
    <section class="section-video">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header36')) ?></div>
            <div class="video">
                <a href="<?= $video ?>" class="popup-video video-impulse" data-back="<?= Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . PageProperty::getValue($model->id, 'video6image')), 641, 360) ?>"></a>
            </div>
        </div>
    </section>
<? }
?>

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

<section class="section-4">
    <div class="wrapper">
        <?=
        PortfolioElementRelativeWidget::widget([
            'pageId' => $model->id,
        ])
        ?>
    </div>
</section>

<?=
PageSeoWidget::widget([
    'pageId'   => $model->id,
    'pageSeo'  => $model->pageSeo,
    'pageView' => $this,
])
?>