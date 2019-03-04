<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Пользователи';
$this->params['breadcrumbs'][] = [ 'label' => 'Главная', 'url' => [ '/site/admin' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'id',
            'username',
//            'password_hash',
//            'password_reset_token',
            'email',
            //'auth_key',
            //'status',
            //'created_at',
            //'updated_at',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
