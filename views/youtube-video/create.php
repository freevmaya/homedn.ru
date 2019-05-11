<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YoutubeVideo */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Youtube видео', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="youtube-video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
