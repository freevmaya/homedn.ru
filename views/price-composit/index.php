<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $priceCaption app\models\PriceCaption */
/* @var $priceOption app\models\PriceOption */
/* @var $priceElement app\models\PriceElement */

$this->title                   = 'Структура пакетов';
$this->params['breadcrumbs'][] = [ 'label' => 'Разделы цен', 'url' => [ '/price-caption/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Раздел ' . $priceCaption->name, 'url' => [ '/price-caption/update', 'id' => $priceCaption->id ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-composit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <? $form                          = ActiveForm::begin() ?>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th></th>                
                <? foreach ($priceOption as $option) {
                    ?><th><?= $option->name ?></th><? }
                ?>
            </tr>
        </thead>
        <tbody>
            <? foreach ($priceElement as $element) {
                ?><tr data-key="<?= $element->name ?>">
                    <td><?= $element->name ?></td>
                    <? foreach ($priceOption as $option) {
                        ?><td><?= Html::checkbox('composit[' . $option->id . '][' . $element->id . ']', isset($composit[$option->id][$element->id])) ?></td><? }
                    ?>
                </tr><? }
                ?>
        </tbody>
    </table>

    <br>

    <?= Html::submitButton('Сохранить', [ 'class' => 'btn btn-success' ]) ?>

    <? ActiveForm::end(); ?>

</div>
