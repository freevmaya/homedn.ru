<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcComplectContent */

$this->title                   = 'Изменить ' . $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Элементы в комплекте', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="calc-complect-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
