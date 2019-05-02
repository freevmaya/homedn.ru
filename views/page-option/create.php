<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageOption */

$this->title                   = 'Новый атрибут - Атрибуты - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Атрибуты', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = 'Новый атрибут';
?>
<div class="page-option-create">

    <h1>Новый атрибут</h1>

    <?=
    $this->render('_form', [
        'model'      => $model,
        'template'   => $template,
        'optionType' => $optionType,
    ])
    ?>

</div>
