<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcComplectContent */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Элементы в комплекте', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-complect-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
