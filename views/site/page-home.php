<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\models\MeasureForm;
use app\widgets\EmployeeSliderWidget;
use app\widgets\WorkProgressWidget;
use app\widgets\PriceCaptionWidget;
use app\widgets\MainPortfolioGalleryWidget;
use app\widgets\MainPortfolioReviewWidget;
use app\widgets\YoutubeVideoWidget;
use app\widgets\CalcInputdataWidget;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;

TemplateAsset::register($this);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<section class="section-1" data-back="<?= PageProperty::getValue($model->id, 'back1') ?>">
    <div class="wrapper">
        <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header1')) ?></div>
        <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header2')) ?></div>
        <? if ($ctalink = PageProperty::getValue($model->id, 'cta1link')) { ?>
            <div class="cta">
                <a href="<?= $ctalink ?>" class="popup-inline"><?= PageProperty::getValue($model->id, 'cta1text') ?></a>
            </div>
        <? } ?>
        <? if ($videolink = PageProperty::getValue($model->id, 'video1link')) { ?>
            <div class="video">
                <a class="video-impulse popup-video" href="<?= $videolink ?>"><span class="text"><?= PageProperty::getValue($model->id, 'video1text') ?></span></a>
            </div>
        <? } ?>
    </div>
</section>

<section class="section-2">
    <?= EmployeeSliderWidget::widget() ?>
</section>

<?
$h = PageProperty::getValue($model->id, 'header3');
$v = PageProperty::getValue($model->id, 'video2link');
$b = PageProperty::getValue($model->id, 'back2');

if ($h || ($v && $b)) {
    ?>
    <section class="section-3">
        <div class="wrapper">
            <? if ($h) { ?><div class="header"><?= nl2br($h) ?></div><? } ?>
            <? if ($v && $b) { ?>
                <div class="video" data-back="<?= $b ?>">
                    <a href="<?= $v ?>" class="video-impulse popup-video"></a>
                </div>
            <? } ?>
        </div>
    </section>
<? } ?>

<section class="section-4">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header4')) ?></div>
        <div class="list"><?= PageProperty::getValue($model->id, 'list1') ?></div>
        <? if ($l = PageProperty::getValue($model->id, 'file1')) { ?>
            <div class="contract">
                <a href="<?= $l ?>" target="_blank"><?= PageProperty::getValue($model->id, 'file1text') ?></a>
            </div>
        <? } ?>
    </div>
    <? if ($i = PageProperty::getValue($model->id, 'image1')) { ?>
        <div class="image">
            <img src="<?= $i ?>">
        </div>
    <? } ?>
</section>

<section class="section-5">
    <div class="image">
        <img src="<?= PageProperty::getValue($model->id, 'image2') ?>">
    </div>
    <? if ($v = PageProperty::getValue($model->id, 'video3link')) { ?>
        <div class="video">
            <a href="<?= $v ?>" class="video-impulse popup-video"></a>
        </div>
    <? } ?>
    <div class="wrapper">
        <div class="right">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header5')) ?></div>
            <div class="list"><?= PageProperty::getValue($model->id, 'list2') ?></div>
            <? if ($ctalink = PageProperty::getValue($model->id, 'cta2link')) { ?>
                <div class="cta">
                    <a href="<?= $ctalink ?>" class="popup-inline"><?= PageProperty::getValue($model->id, 'cta2text') ?></a>
                </div>
            <? } ?>
        </div>
    </div>
</section>

<section class="section-6">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header6')) ?></div>
        <?= WorkProgressWidget::widget() ?>
    </div>
</section>

<section class="section-7">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header7')) ?></div>
        <?=
        PriceCaptionWidget::widget([
            'underPrice' => 'точная стоимость после замера',
            'buttonText' => 'Узнать точную цену',
        ])
        ?>
    </div>
</section>

<section class="section-8" data-back="<?= PageProperty::getValue($model->id, 'back3') ?>">
    <div class="wrapper">
        <div class="header">
            <?= PageProperty::getValue($model->id, 'header8') ?>
            <span class="count"><?= PageProperty::getValue($model->id, 'header9') ?></span>
        </div>
        <?= MainPortfolioGalleryWidget::widget() ?>
        <div class="cta">
            <a href="<?= PageProperty::getValue($model->id, 'cta3link') ?>" target="_blank"><?= PageProperty::getValue($model->id, 'cta3text') ?></a>
        </div>
    </div>
</section>

<section class="section-9">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header10')) ?></div>
        <?=
        MainPortfolioReviewWidget::widget([
            'countCommonReview'  => PageProperty::getValue($model->id, 'reviewcountall'),
            'countVisibleReview' => PageProperty::getValue($model->id, 'reviewcountopen'),
            'buttonText'         => PageProperty::getValue($model->id, 'cta4text'),
        ])
        ?>
    </div>
</section>

<section class="section-10">
    <div class="wrapper">
        <div class="header">
            <?= nl2br(PageProperty::getValue($model->id, 'header11')) ?>
        </div>
        <div class="youtube-video">
            <?= YoutubeVideoWidget::widget() ?>
        </div>
        <div class="cta">
            <a href="<?= PageProperty::getValue($model->id, 'cta5link') ?>" target="_blank"><?= PageProperty::getValue($model->id, 'cta5text') ?> <img src="<?= Yii::$app->params['image_dir_url'] ?>yt-icon.png"></a>
        </div>
    </div>
</section>

<section class="section-11">
    <div class="wrapper">
        <div class="header"><?= PageProperty::getValue($model->id, 'header12') ?></div>
        <div class="calc"><?=
            CalcInputdataWidget::widget([
                'calcHeader'   => PageProperty::getValue($model->id, 'header13'),
                'submitButton' => PageProperty::getValue($model->id, 'cta6text'),
            ])
            ?></div>
        <div class="image"><img src="<?= PageProperty::getValue($model->id, 'image3') ?>"></div>
    </div>
</section>

<section class="section-12">
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
            <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header14')) ?></div>
            <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header15')) ?></div>
            <div class="socials">
                <?=
                app\widgets\SocialsWidget::widget([
                    'position' => 'foz',
                ])
                ?>
            </div>
            <div class="desc"><?= nl2br(PageProperty::getValue($model->id, 'text1desc')) ?></div>
        </div>
    </div>
</section>

<section class="section-content">
    <div class="wrapper">
        <?=
        PageSeoWidget::widget([
            'pageId'   => $model->id,
            'pageSeo'  => $model->pageSeo,
            'pageView' => $this,
        ])
        ?>
    </div>
</section>