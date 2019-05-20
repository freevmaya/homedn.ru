<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use app\assets\TemplateAsset;

TemplateAsset::register($this);

$this->title = $name;
?>
<section class="section-1">
    <div class="wrapper">
        <h1><?= Html::encode($message) ?></h1>

    </div>

</section>