<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceCaption */

$this->title                   = 'Изменить ' . $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Разделы цен', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="price-caption-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
