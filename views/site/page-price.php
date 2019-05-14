<?php

use yii\widgets\Breadcrumbs;
use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\widgets\PriceCaptionWidget;
use app\widgets\CalcInputdataWidget;
use app\widgets\PriceSectionListWidget;
use app\models\MeasureForm;
use app\widgets\SocialsWidget;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;

TemplateAsset::register($this);

/* @var $model app\models\Page */
?>

<section class="section-1">
    <div class="wrapper">
        <div class="header"><?= PageProperty::getValue($model->id, 'header37') ?></div>
    </div>
</section>

<section class="section-2">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header38')) ?></div>
        <?=
        PriceCaptionWidget::widget([
            'underPrice' => 'точная стоимость после замера',
            'buttonText' => 'Узнать точную цену',
        ])
        ?>
    </div>
</section>

<section class="section-3">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header39')) ?></div>
        <div class="calc"><?=
            CalcInputdataWidget::widget([
                'calcHeader'   => PageProperty::getValue($model->id, 'header40'),
                'submitButton' => PageProperty::getValue($model->id, 'cta10text'),
            ])
            ?></div>
        <div class="image"><img src="<?= PageProperty::getValue($model->id, 'image7') ?>"></div>
    </div>
</section>

<section class="section-4">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header41')) ?></div>
        <?= PriceSectionListWidget::widget([ 'pageId' => $model->id ]) ?>
    </div>
</section>

<? if ($video = PageProperty::getValue($model->id, 'video7link')) { ?>
    <section class="section-5">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header43')) ?></div>
            <div class="video">
                <a href="<?= $video ?>" class="popup-video video-impulse" data-back="<?= Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . PageProperty::getValue($model->id, 'video7image')), 641, 360) ?>"></a>
            </div>
        </div>
    </section>
<? } ?>

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
            <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header44')) ?></div>
            <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header45')) ?></div>
            <div class="socials">
                <?=
                app\widgets\SocialsWidget::widget([
                    'position' => 'foz',
                ])
                ?>
            </div>
            <div class="desc"><?= nl2br(PageProperty::getValue($model->id, 'text3desc')) ?></div>
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