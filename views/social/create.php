<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Social */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Социальные сети', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
