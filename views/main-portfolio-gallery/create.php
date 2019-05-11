<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainPortfolioGallery */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Галерея портфолио', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-portfolio-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
