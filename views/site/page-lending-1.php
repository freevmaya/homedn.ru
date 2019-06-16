<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\models\MeasureForm;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;
use app\widgets\WorkstepWidget;
use app\widgets\MainPortfolioGalleryWidget;
use app\widgets\PriceCaptionWidget;
use app\widgets\CalcInputdataWidget;
use app\widgets\LendingListWidget;

TemplateAsset::register($this);
?>

<section class="section-1" data-back="<?= PageProperty::getValue($model->id, 'image14') ?>">
    <div class="wrapper">
        <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header61')) ?></div>
        <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header62')) ?></div>
        <div class="cta">
            <a href="<?= PageProperty::getValue($model->id, 'cta14link') ?>" class="popup-inline"><?= PageProperty::getValue($model->id, 'cta14text') ?></a>
        </div>
    </div>
</section>

<?
$h = PageProperty::getValue($model->id, 'header65');
$v = PageProperty::getValue($model->id, 'video9link');
$b = PageProperty::getValue($model->id, 'back5');

if ($h || ($v && $b)) {
    ?>
    <section class="section-2">
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

<? if ($model->worksteps) { ?>
    <section class="section-3">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header67')) ?></div>
            <?=
            WorkstepWidget::widget([
                'pageId'      => $model->id,
                'galleryLink' => [
                    'label' => PageProperty::getValue($model->id, 'cta16text'),
                    'url'   => PageProperty::getValue($model->id, 'cta16link'),
                ],
            ])
            ?>
        </div>
    </section>
<? } ?>

<? $mainPageId = SiteProperty::getValue('mainpageid') ?>
<section class="section-4">
    <div class="header">
        <?= PageProperty::getValue($mainPageId, 'header8') ?>
        <span class="count"><?= PageProperty::getValue($mainPageId, 'header9') ?></span>
    </div>
    <?= MainPortfolioGalleryWidget::widget() ?>
    <div class="cta">
        <a href="<?= PageProperty::getValue($mainPageId, 'cta3link') ?>" target="_blank"><?= PageProperty::getValue($mainPageId, 'cta3text') ?></a>
    </div>
</section>

<section class="section-5">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header68')) ?></div>
        <?=
        PriceCaptionWidget::widget([
            'underPrice' => 'точная стоимость после замера',
            'buttonText' => 'Узнать точную цену',
        ])
        ?>
    </div>
</section>

<section class="section-6">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header69')) ?></div>
        <div class="calc"><?=
            CalcInputdataWidget::widget([
                'calcHeader'   => PageProperty::getValue($model->id, 'header70'),
                'submitButton' => PageProperty::getValue($model->id, 'cta17text'),
            ])
            ?></div>
        <div class="image"><img src="<?= PageProperty::getValue($model->id, 'image16') ?>"></div>
    </div>
</section>

<? if ($model->lendingList1s) { ?>
    <section class="section-7">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header71')) ?></div>
            <?=
            LendingListWidget::widget([
                'pageId'     => $model->id,
                'listNumber' => 1,
            ])
            ?>
        </div>
    </section>
<? } ?>

<? if ($model->lendingList2s) { ?>
    <section class="section-7">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header72')) ?></div>
            <?=
            LendingListWidget::widget([
                'pageId'     => $model->id,
                'listNumber' => 2,
            ])
            ?>
        </div>
    </section>
<? } ?>

<section class="section-8">
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