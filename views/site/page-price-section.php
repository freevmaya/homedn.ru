<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\widgets\CalcInputdataWidget;
use app\models\MeasureForm;
use app\widgets\SocialsWidget;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;

TemplateAsset::register($this);

/* @var $model app\models\Page */
?>

<section class="section-1">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header46')) ?></div>
    </div>
</section>

<section class="section-2">
    <div class="wrapper">
        <?= PageProperty::getValue($model->id, 'text4desc') ?>
    </div>
</section>

<section class="section-3">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header47')) ?></div>
        <div class="calc"><?=
            CalcInputdataWidget::widget([
                'calcHeader'   => PageProperty::getValue($model->id, 'header48'),
                'submitButton' => PageProperty::getValue($model->id, 'cta11text'),
            ])
            ?></div>
        <div class="image"><img src="<?= PageProperty::getValue($model->id, 'image10') ?>"></div>
    </div>
</section>

<section class="section-4">
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
            <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header49')) ?></div>
            <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header50')) ?></div>
            <div class="socials">
                <?=
                SocialsWidget::widget([
                    'position' => 'foz',
                ])
                ?>
            </div>
            <div class="desc"><?= nl2br(PageProperty::getValue($model->id, 'text5desc')) ?></div>
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