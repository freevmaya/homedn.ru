<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\helpers\ArticleElementViewCount;
use yii\widgets\Breadcrumbs;
use app\models\MeasureForm;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;
use app\widgets\ArticleElementRelativeWidget;
use app\widgets\SocialsWidget;
use app\widgets\EmployeeListWidget;
use app\widgets\LendingGalleryWidget;
use app\widgets\StyleListWidget;
use app\widgets\WorkstepWidget;
use app\widgets\PriceCaptionWidget;
use app\widgets\CalcInputdataWidget;
use app\widgets\LendingListWidget;

TemplateAsset::register($this);
?>

<section class="section-1" data-back="<?= PageProperty::getValue($model->id, 'image15') ?>">
    <div class="wrapper">
        <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header63')) ?></div>
        <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header64')) ?></div>
        <div class="cta">
            <a href="<?= PageProperty::getValue($model->id, 'cta15link') ?>" class="popup-inline"><?= PageProperty::getValue($model->id, 'cta15text') ?></a>
        </div>
    </div>
</section>

<?
$h = PageProperty::getValue($model->id, 'header66');
$v = PageProperty::getValue($model->id, 'video10link');
$b = PageProperty::getValue($model->id, 'back6');

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

<? if (PageProperty::getValue($model->id, 'check1')) { ?>
    <section class="section-3">
        <div class="wrapper">
            <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header73')) ?></div>
            <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header74')) ?></div>
            <?=
            EmployeeListWidget::widget([
                'designer' => true,
            ])
            ?>
        </div>
    </section>
<? } ?>

<? if ($model->lendingGalleries) { ?>
    <section class="section-4">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header75')) ?></div>
            <?=
            LendingGalleryWidget::widget([
                'pageId'      => $model->id,
                'galleryLink' => [
                    'label' => PageProperty::getValue($model->id, 'cta18text'),
                    'url'   => PageProperty::getValue($model->id, 'cta18link'),
                ],
            ])
            ?>
        </div>
    </section>
<? } ?>

<? if ($model->styleLists) { ?>
    <section class="section-5">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header76')) ?></div>
            <?=
            StyleListWidget::widget([
                'pageId' => $model->id,
            ])
            ?>
        </div>
    </section>
<? } ?>

<? if ($model->worksteps) { ?>
    <section class="section-6">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header77')) ?></div>
            <?=
            WorkstepWidget::widget([
                'pageId'      => $model->id,
                'galleryLink' => [
                    'label' => PageProperty::getValue($model->id, 'cta19text'),
                    'url'   => PageProperty::getValue($model->id, 'cta19link'),
                ],
            ])
            ?>
        </div>
    </section>
<? } ?>

<? if (PageProperty::getValue($model->id, 'check2')) { ?>
    <section class="section-7">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header78')) ?></div>
            <?=
            PriceCaptionWidget::widget([
                'underPrice'   => 'точная стоимость после замера',
                'buttonText'   => 'Узнать точную цену',
                'selectedType' => 3,
            ])
            ?>
        </div>
    </section>
<? } ?>

<? if (PageProperty::getValue($model->id, 'check3')) { ?>
    <section class="section-11">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header82')) ?></div>
            <div class="price-list"><?= PageProperty::getValue($model->id, 'text7desc') ?></div>
        </div>
    </section>
<? } ?>

<section class="section-8">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header79')) ?></div>
        <div class="calc"><?=
            CalcInputdataWidget::widget([
                'calcHeader'   => PageProperty::getValue($model->id, 'header80'),
                'submitButton' => PageProperty::getValue($model->id, 'cta20text'),
            ])
            ?></div>
        <div class="image"><img src="<?= PageProperty::getValue($model->id, 'image16') ?>"></div>
    </div>
</section>

<? if ($model->lendingList1s) { ?>
    <section class="section-9">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header81')) ?></div>
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
    <section class="section-12">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header81')) ?></div>
            <?=
            LendingListWidget::widget([
                'pageId'     => $model->id,
                'listNumber' => 2,
            ])
            ?>
        </div>
    </section>
<? } ?>

<section class="section-10">
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