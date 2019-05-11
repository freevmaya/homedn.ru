<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title                   = 'Изменить - ' . $model->name;
$this->params['breadcrumbs'][] = [ 'label' => $model->pageType->name, 'url' => [ 'index', 'page_type' => $pageType->code ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="page-update">

    <h1>Изменить <?= $model->name ?></h1>

    <?=
    $this->render('_form', [
        'model'    => $model,
        'modelSeo' => $modelSeo,
        'pageType' => $pageType,
        'parent'   => $parent,
        'template' => $template,
    ])
    ?>

</div>
