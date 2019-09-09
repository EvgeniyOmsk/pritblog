<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12 page-body">
  <div class="row">
    <div class="sub-title">
      <a href="/" title="Go to Home Page"><h2>Back Home</h2></a>
      <a href="contact.html"><i class="icon-envelope"></i></a>
    </div>


    <div class="col-md-12 content-page">

      <!-- Blog Post Start -->
      <div class="col-md-12 blog-post" style="display: block;">
        <div class="post-title">
          <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-offset-3 col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

          <div style="color:#999;margin:1em 0">
            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
            <br>
            Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
          </div>

          <div class="form-group">
              <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
          </div>

            <?php ActiveForm::end(); ?>
        </div>
      </div>
      <!-- Blog Post End -->


    </div>

  </div>

</div>
