<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title                   = $model->username;
$this->params['breadcrumbs'][] = [ 'label' => 'Главная', 'url' => [ '/site/admin' ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Пользователи', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', [ 'update', 'id' => $model->id ], [ 'class' => 'btn btn-primary' ]) ?>
        <?=
        Html::a('Удалить', [ 'delete', 'id' => $model->id ], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'username',
            'password_hash',
            'password_reset_token',
            'email:email',
            'auth_key',
            'status',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
