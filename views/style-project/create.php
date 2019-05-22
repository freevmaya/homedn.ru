<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StyleProject */

$this->title = 'Create Style Project';
$this->params['breadcrumbs'][] = ['label' => 'Style Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="style-project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
