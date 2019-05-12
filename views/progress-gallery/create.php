<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgressGallery */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Достижения', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
