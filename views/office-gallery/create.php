<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OfficeGallery */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Галерея офиса', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
