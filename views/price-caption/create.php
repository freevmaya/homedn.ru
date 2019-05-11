<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceCaption */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Разделы цен', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-caption-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
