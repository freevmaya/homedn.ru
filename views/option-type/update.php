<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OptionType */

$this->title                   = 'Изменить - ' . $model->name . 'Типы данных - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Типы данных', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="option-type-update">

    <h1><?= 'Изменить - ' . $model->name ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
