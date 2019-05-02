<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageOptionValue */

$this->title = 'Create Page Option Value';
$this->params['breadcrumbs'][] = ['label' => 'Page Option Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-option-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
