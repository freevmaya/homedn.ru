<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageType */

$this->title                   = 'Изменить ' . $model->name . ' - Типы контента - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Типы контента', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="page-type-update">

    <h1>Изменить <?= $model->name ?></h1>

    <?=
    $this->render('_form', [
        'model'     => $model,
        'templates' => $templates,
    ])
    ?>

</div>
