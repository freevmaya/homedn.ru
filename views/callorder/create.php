<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Callorder */

$this->title = 'Create Callorder';
$this->params['breadcrumbs'][] = ['label' => 'Callorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
