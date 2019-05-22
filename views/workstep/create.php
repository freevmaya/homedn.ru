<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Workstep */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Этапы', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workstep-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'page'  => $page,
    ])
    ?>

</div>
