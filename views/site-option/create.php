<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOption */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Свойства сайта', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'      => $model,
        'optionType' => $optionType,
    ])
    ?>

</div>
