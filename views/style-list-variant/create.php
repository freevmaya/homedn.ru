<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StyleListVariant */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Варианты стиля', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="style-list-variant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'     => $model,
        'styleList' => $styleList,
    ])
    ?>

</div>
