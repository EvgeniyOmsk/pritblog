<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
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
            <a href="single.html"><h1><?= $model->title ?></h1></a>
          </div>
          <div class="post-info">
            <span><?= date('Y-m-d H:i', $model->created_at)?> <a href="#" target="_blank">Alex Parker</a></span>
          </div>
          <div><?= $model->description ?></div>
        </div>
        <!-- Blog Post End -->


    </div>

  </div>



  <!-- Subscribe Form Start -->
  <div class="col-md-8 col-md-offset-2">
    <form id="mc-form" method="post" action="http://uipasta.us14.list-manage.com/subscribe/post?u=854825d502cdc101233c08a21&amp;id=86e84d44b7" novalidate="true">

      <div class="subscribe-form margin-top-20">
        <input id="mc-email" type="email" placeholder="Email Address" class="text-input" name="EMAIL">
        <button class="submit-btn" type="submit">Submit</button>
      </div>
      <p>Subscribe to my weekly newsletter</p>
      <label for="mc-email" class="mc-label"></label>
    </form>

  </div>
  <!-- Subscribe Form End -->

</div>