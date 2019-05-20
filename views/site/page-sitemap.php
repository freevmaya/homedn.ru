<?php

use app\assets\TemplateAsset;
use app\widgets\SitemapWidget;

TemplateAsset::register($this);

/* @var $model app\models\Page */
?>

<section class="section-1">
    <div class="wrapper">
        <h1><?= $model->pageSeo->h1 ?></h1>
        <?= SitemapWidget::widget() ?>
    </div>
</section>