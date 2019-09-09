<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
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

        <p>Please fill out the following fields to signup:</p>
        <div class="col-md-offset-3 col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

          <div class="form-group">
              <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
          </div>

            <?php ActiveForm::end(); ?>
        </div>
      </div>
      <!-- Blog Post End -->


    </div>

  </div>

</div>
