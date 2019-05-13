<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\widgets\PortfolioSectionMenuWidget;
use app\widgets\PortfolioElementListWidget;
use app\models\MeasureForm;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;

TemplateAsset::register($this);

/* @var $model app\models\Page */
?>

<section class="section-1">
    <div class="wrapper">
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header28')) ?></div>
        <?=
        PortfolioSectionMenuWidget::widget([
            'pageId' => $model->id,
        ])
        ?>
    </div>
</section>

<section class="section-2">
    <div class="wrapper">
        <?=
        PortfolioElementListWidget::widget([
            'pageId' => $model->id,
        ])
        ?>
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