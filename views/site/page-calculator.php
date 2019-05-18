<?php

use Yii;
use app\assets\TemplateAsset;
use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\widgets\CalcInputdataWidget;
use app\widgets\CalcInputdataShowWidget;
use app\widgets\CalcRoomShowWidget;

/* @var $this yii\web\View */

Yii::$app->controller->layout = 'calculator';

TemplateAsset::register($this);

if (isset(Yii::$app->request->get()['k'])) {

    $this->params['breadcrumbs']   = [ [ 'label' => $model->name, 'url' => [ 'site/frontend', 'id' => SiteProperty::getValue('calcpageid') ] ] ];
    $this->params['breadcrumbs'][] = [ 'label' => 'Ремонт квартиры в ' ];
    ?>

    <section class="section-2">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header53')) ?></div>
        </div>
    </section>

    <section class="section-3">
        <div class="wrapper">
            <?=
            CalcInputdataShowWidget::widget([
                'calcKey' => Yii::$app->request->get()['k'],
            ])
            ?>
        </div>
    </section>

    <section class="section-4">

    </section>

    <section class="section-5">
        <?=
        CalcRoomShowWidget::widget([
            'calcKey' => Yii::$app->request->get()['k'],
        ])
        ?>
    </section>

    <?
} else {
    $this->params['breadcrumbs'] = [ [ 'label' => $model->name ] ];
    ?>
    <section class="section-1">
        <div class="wrapper">
            <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header51')) ?></div>
            <div class="calc"><?=
                CalcInputdataWidget::widget([
                    'calcHeader'   => PageProperty::getValue($model->id, 'header52'),
                    'submitButton' => PageProperty::getValue($model->id, 'cta12text'),
                ])
                ?></div>
            <div class="image"><img src="<?= PageProperty::getValue($model->id, 'image11') ?>"></div>
        </div>
    </section>
    <?
}
