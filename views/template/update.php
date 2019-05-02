<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Template */

$this->title                   = 'Изменить ' . $model->id . ' - Шаблоны - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Шаблоны', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->id, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="template-update">

    <h1>Изменить <?= $model->id ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
