<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcComponentGroup */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Группы элементов', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-component-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'         => $model,
        'calcRooms'     => $calcRooms,
        'calcInputdata' => $calcInputdata,
    ])
    ?>

</div>
