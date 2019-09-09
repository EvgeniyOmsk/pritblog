<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use main\modules\frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <!-- Meta Tag -->
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- SEO -->
  <meta name="description" content="150 words">
  <meta name="author" content="uipasta">
  <meta name="url" content="http://www.yourdomainname.com">
  <meta name="copyright" content="">
  <meta name="robots" content="index,follow">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/images/favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="/images/favicon/apple-touch-icon.png">

  <!-- Google Web Fonts  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">

  <!-- HTML5 shiv and Respond.js support IE8 or Older for HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="main">
  <div class="container">
    <div class="row">

      <!-- About Me (Left Sidebar) Start -->
      <div class="col-md-3">
        <div class="about-fixed">

          <div class="my-pic">
            <img src="/images/pic/my-pic.png" alt="">
            <a href="javascript:void(0)" class="collapsed" data-target="#menu" data-toggle="collapse"><i class="icon-menu menu"></i></a>
            <div id="menu" class="collapse">
              <ul class="menu-link">
                <li><a href="<?= Url::to('index') ?>">Home</a></li>
                <?php if(Yii::$app->user->isGuest) {?>
                  <li><a href="<?= Url::to('signup') ?>">Signup</a></li>
                  <li><a href="<?= Url::to('login') ?>">Login</a></li>
                <?php }  else { ?>
                  <li><a href="<?= Url::to('/backend/site/index') ?>"><?= ucfirst(Yii::$app->user->identity->username) ?></a></li>
                  <li><a href="<?= Url::to('logout') ?>">Logout</a></li>
                <?php } ?>

              </ul>
            </div>
          </div>



          <div class="my-detail">

            <div class="white-spacing">
              <h1>Alex Parker</h1>
              <span>Web Developer</span>
            </div>

            <ul class="social-icon">
              <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
            </ul>

          </div>
        </div>
      </div>
      <!-- About Me (Left Sidebar) End -->

      <!-- Blog Post (Right Sidebar) Start -->
      <div class="col-md-9">
        <?= Alert::widget() ?>
        <?= $content ?>
        <!-- Footer Start -->
        <div class="col-md-12 page-body margin-top-50 footer">
          <footer>
            <ul class="menu-link">
              <li><a href="<?= Url::to('index') ?>">Home</a></li>
              <li><a href="<?= Url::to('about') ?>">About</a></li>
              <li><a href="<?= Url::to('signup') ?>">Signup</a></li>
              <li><a href="<?= Url::to('login') ?>">Login</a></li>
            </ul>

            <p>© Copyright 2016 DevBlog. All rights reserved</p>


            <!-- UiPasta Credit Start -->
            <div class="uipasta-credit">Design By <a href="http://www.uipasta.com" target="_blank">UiPasta</a></div>
            <!-- UiPasta Credit End -->


          </footer>
        </div>
        <!-- Footer End -->
      </div>


    </div>
    <!-- Blog Post (Right Sidebar) End -->

  </div>
</div>


<!-- Back to Top Start -->
<a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
<!-- Back to Top End -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

