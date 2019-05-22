<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LendingGallery */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Галерея', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lending-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'page'  => $page,
    ])
    ?>

</div>
