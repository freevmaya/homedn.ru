<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OptionType */

$this->title                   = 'Новый - Типы данных - Администрирование - ' . Yii::$app->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Типы данных', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = 'Новый';
?>
<div class="option-type-create">

    <h1>Типы данных</h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
