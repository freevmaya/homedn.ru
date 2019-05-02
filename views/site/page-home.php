<?php

use app\helpers\PageProperty;
use app\assets\TemplateAsset;

TemplateAsset::register($this);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<section class="section-1" data-back="<?= PageProperty::getValue($model->id, 'back1') ?>">
    <div class="wrapper">
        <div class="header-1"><?= nl2br(PageProperty::getValue($model->id, 'header1')) ?></div>
        <div class="header-2"><?= nl2br(PageProperty::getValue($model->id, 'header2')) ?></div>
        <div class="cta">
            
        </div>
    </div>
</section>