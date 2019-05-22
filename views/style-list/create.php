<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StyleList */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Стили', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="style-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'page'  => $page,
    ])
    ?>

</div>
