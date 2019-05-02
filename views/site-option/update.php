<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOption */

$this->title                   = 'Изменить ' . $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Свойства сайта', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="site-option-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'      => $model,
        'optionType' => $optionType,
    ])
    ?>

</div>
