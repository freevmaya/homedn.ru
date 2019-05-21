<?php

use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\assets\TemplateAsset;
use app\models\MeasureForm;
use app\widgets\ArticleSectionListWidget;
use app\widgets\FormViewWidget;
use app\widgets\PageSeoWidget;
use yii\widgets\Breadcrumbs;
use app\widgets\ArticleElementList;
use app\widgets\SocialsWidget;

TemplateAsset::register($this);

if ($model->page_id) {
    $this->params['breadcrumbs']   = [ [ 'label' => $model->page->name, 'url' => [ 'site/frontend', 'id' => $model->page_id ] ] ];
    $this->params['breadcrumbs'][] = [ 'label' => $model->name ];
} else {
    $this->params['breadcrumbs'] = [ [ 'label' => $model->name ] ];
}

/* @var $model app\models\Page */
?>

<section class="section-1">
    <div class="wrapper">
        <?=
        Breadcrumbs::widget([
            'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [ 'label' => 'Главная', 'url' => '/' ],
        ])
        ?>
        <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header57')) ?></div>
        <?=
        ArticleSectionListWidget::widget([
            'sectionId' => $model->page_id ? $model->id : false,
        ])
        ?>
        <?=
        ArticleElementList::widget([
            'sectionId' => $model->page_id ? $model->id : false,
        ])
        ?>
    </div>
</section>

<section class="section-2">
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

<?=
PageSeoWidget::widget([
    'pageId'   => $model->id,
    'pageSeo'  => $model->pageSeo,
    'pageView' => $this,
])
?>