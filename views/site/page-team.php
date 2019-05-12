<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\models\MeasureForm;
use app\widgets\OfficeGalleryWidget;
use app\widgets\EmployeeListWidget;
use app\widgets\ProgressGalleryWidget;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;

TemplateAsset::register($this);

/* @var $model app\models\Page */
?>

<section class="section-1" data-back="<?= PageProperty::getValue($model->id, 'back4') ?>">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header16')) ?></div>
        <? if ($videolink = PageProperty::getValue($model->id, 'video4link')) { ?>
            <div class="video">
                <a href="<?= $videolink ?>" class="popup-video">
                    <img src="<?= Yii::$app->params['image_dir_url'] ?>video5.png">
                    <span class="cta"><?= PageProperty::getValue($model->id, 'video4text') ?></span>
                </a>
            </div>
        <? } ?>
    </div>
</section>

<? if (($link1 = PageProperty::getValue($model->id, 'cta7link')) && ($link2 = PageProperty::getValue($model->id, 'cta8link'))) { ?>
    <section class="section-2">
        <div class="wrapper">
            <? if ($link1) { ?>
                <a href="<?= $link1 ?>" class="scroll-link"><?= PageProperty::getValue($model->id, 'cta7text') ?></a>
            <? } ?>
            <? if ($link2) { ?>
                <a href="<?= $link2 ?>" class="scroll-link"><?= PageProperty::getValue($model->id, 'cta8text') ?></a>
            <? } ?>
        </div>
    </section>
<? }
?>

<section class="section-3" id="command">
    <div class="wrapper">
        <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header17')) ?></div>
        <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header18')) ?></div>
        <?= EmployeeListWidget::widget() ?>
    </div>
</section>

<section class="section-4">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header19')) ?></div>
        <?= OfficeGalleryWidget::widget() ?>
    </div>
</section>

<section class="section-5" id="progress">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header20')) ?></div>
    </div>
</section>

<?= ProgressGalleryWidget::widget() ?>

<section class="section-6">
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

