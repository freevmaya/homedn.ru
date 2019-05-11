<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioReview */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Отзывы', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'            => $model,
        'portfolioElement' => $portfolioElement,
    ])
    ?>

</div>
