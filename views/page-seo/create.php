<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageSeo */

$this->title = 'Create Page Seo';
$this->params['breadcrumbs'][] = ['label' => 'Page Seos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-seo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
