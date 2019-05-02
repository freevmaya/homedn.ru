<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageType */

$this->title                   = 'Новый - Типы контента - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Типы контента', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = 'Новый';
?>
<div class="page-type-create">

    <h1>Новый тип</h1>

    <?=
    $this->render('_form', [
        'model'     => $model,
        'templates' => $templates,
    ])
    ?>

</div>
