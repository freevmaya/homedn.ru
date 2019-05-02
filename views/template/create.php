<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Template */

$this->title                   = 'Новый - Шаблоны - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Шаблоны', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = 'Новый';
?>
<div class="template-create">

    <h1>Новый шаблон</h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
