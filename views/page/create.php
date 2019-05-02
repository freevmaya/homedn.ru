<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $pageType app\models\PageType */

$this->title                   = 'Новый - ' . ($pageType ? $pageType->name : 'Записи') . ' - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => $pageType ? $pageType->name : 'Записи', 'url' => [ 'index', 'page_type' => $pageType->code ] ];
$this->params['breadcrumbs'][] = $pageType ? $pageType->name : 'Записи';
?>
<div class="page-create">

    <h1>Создание</h1>

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
