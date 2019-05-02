<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageOption */

$this->title                   = 'Изменить - ' . $model->name . ' - Атрибуты - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Атрибуты', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="page-option-update">

    <h1>Изменить <?= $model->name ?></h1>

    <?=
    $this->render('_form', [
        'model'      => $model,
        'template'   => $template,
        'optionType' => $optionType,
    ])
    ?>

</div>
