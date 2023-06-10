<?php

//use Yii;
use app\assets\TemplateAsset;
use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use app\widgets\CalcInputdataWidget;
use app\widgets\CalcInputdataShowWidget;
use app\widgets\CalcRoomShowWidget;
use app\widgets\FormViewWidget;
use app\models\CalcRequestForm;
use app\widgets\CalcCollectWidget;
use app\widgets\CalcComplectContentWidget;

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
        <div class="wrapper">
            <div class="template-styles">
                <div class="header"><?= nl2br(PageProperty::getValue($model->id, 'header54')) ?></div>
                <div class="desc"><?= nl2br(PageProperty::getValue($model->id, 'text6desc')) ?></div>
                <?=
                CalcCollectWidget::widget([
                    'calcKey' => Yii::$app->request->get()['k'],
                ])
                ?>
            </div>
        </div>
    </section>

    <section class="section-5">
        <?=
        CalcRoomShowWidget::widget([
            'calcKey' => Yii::$app->request->get()['k'],
        ])
        ?>
    </section>

    <section class="section-6">
        <div class="wrapper">
            <?=
            CalcComplectContentWidget::widget([
                'calcKey' => Yii::$app->request->get()['k'],
                'header1' => PageProperty::getValue($model->id, 'header55'),
                'header2' => PageProperty::getValue($model->id, 'header56'),
            ])
            ?>
        </div>
    </section>

    <section class="section-7">
        <div class="wrapper">
            <div class="cont">
                <div class="header">Итого: <span id="sum-bottom"></span></div>
                <div class="subheader"><?= PageProperty::getValue($model->id, 'cta13text') ?></div>
                <?=
                FormViewWidget::widget([
                    'formClass'     => CalcRequestForm::class,
                    'submitMessage' => PageProperty::getValue($model->id, 'cta13link'),
                ])
                ?>
            </div>
        </div>
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
