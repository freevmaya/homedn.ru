<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Вызов замерщика';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <? /* <p>
      <?= Html::a('Create Callorder', ['create'], ['class' => 'btn btn-success']) ?>
      </p> */ ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
//            'id',
            'name',
            'phone',
            'created_at',
//            'updated_at',
//            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>


</div>
