<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title                   = 'Вход в административную панель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1>Авторизация</h1>

    <p>Для входа укажите свои данные</p>

    <?php
    $form                          = ActiveForm::begin([
                'id'          => 'login-form',
                'layout'      => 'horizontal',
                'fieldConfig' => [
                    'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
                    'labelOptions' => [ 'class' => 'col-lg-2 control-label' ],
                ],
    ]);
    ?>

    <?= $form->field($model, 'username')->textInput([ 'autofocus' => true ]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?=
    $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-2 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-6\">{error}</div>",
    ])
    ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton('Войти', [ 'class' => 'btn btn-primary btn-lg', 'name' => 'login-button' ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
