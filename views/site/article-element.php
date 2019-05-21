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

TemplateAsset::register($this);

/* @var $model app\models\Page */

ArticleElementViewCount::count($model->id);

if ($model->page && $model->page->page) {
    $this->params['breadcrumbs'] = [ [ 'label' => $model->page->page->name, 'url' => [ 'site/frontend', 'id' => SiteProperty::getValue('blogpageid') ] ] ];
}

if ($model->page_id) {
    $this->params['breadcrumbs'][] = [ 'label' => $model->page->name, 'url' => [ 'site/frontend', 'id' => $model->page->id ] ];
}

$this->params['breadcrumbs'][] = [ 'label' => $model->name ];
?>

<section class="section-1"<? if ($color                         = PageProperty::getValue($model->id, 'color1')) { ?> style="background-color: <?= $color ?>;"<? } ?>>
    <? if ($image = PageProperty::getValue($model->id, 'image13')) { ?>
        <div class="image">
            <img src="<?= $image ?>">
        </div>
    <? } ?>
    <div class="wrapper">
        <div class="header-1">
            <?= nl2br(PageProperty::getValue($model->id, 'header59')) ?>
        </div>
        <div class="header-2">
            <?= nl2br(PageProperty::getValue($model->id, 'header60')) ?>
        </div>
    </div>
</section>

<section class="section-2">
    <div class="wrapper">
        <?=
        Breadcrumbs::widget([
            'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [ 'label' => 'Главная', 'url' => '/' ],
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

<section class="section-3">
    <div class="wrapper">
        <div class="header">Смотрите также:</div>
        <?=
        ArticleElementRelativeWidget::widget([
            'elementId' => $model->id,
        ])
        ?>
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
            <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header14')) ?></div>
            <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header15')) ?></div>
            <div class="socials">
                <?=
                SocialsWidget::widget([
                    'position' => 'foz',
                ])
                ?>
            </div>
            <div class="desc"><?= nl2br(PageProperty::getValue($model->id, 'text1desc')) ?></div>
        </div>
    </div>
</section>