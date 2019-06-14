<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StyleListVariant */

$this->title                   = 'Изменить ' . $model->id;
$this->params['breadcrumbs'][] = [ 'label' => 'Варианты стиля', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->id, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="style-list-variant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'     => $model,
        'styleList' => $styleList,
    ])
    ?>

</div>
