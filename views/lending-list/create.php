<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LendingList */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Блоки описаний', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lending-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'page'  => $page,
    ])
    ?>

</div>
