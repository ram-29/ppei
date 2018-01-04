<?php

use yii\helpers\Html;
?>
<?= Yii::$app->view->renderFile('@app/views/articles-layouts/articles-header.php', ['feature' => $feature]) ?>

<div id="articles-head" class="row">
  <div class="col-md-7">
    <div class="card hvr-float">
      <img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
      <div class="card-img-overlay">
        <div class="card-content">
          <h4><a class="card-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($contents[0]['date'], 0, -12)) ?>/<?= $contents[0]['slug'] ?>">
            <?= $contents[0]['title'] ?>
          </a></h4>
          <h6 class="card-details lead">
            By PPEIV2 &#8226; 
            <i class="fa fa-clock-o" aria-hidden="true"></i> 
            <span id="h-time-0"></span> &#8226;
              <?= $this->registerJs('var ht0 = $("#h-time-0"); ht0.text("Published "+moment("'.$contents[0]['date'].'").fromNow());'); ?>
            <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
            <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
          </h6>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card hvr-float">
      <img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
      <div class="card-img-overlay">
        <div class="card-content">
          <h4><a class="card-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($contents[1]['date'], 0, -12)) ?>/<?= $contents[1]['slug'] ?>">
            <?= $contents[1]['title'] ?>
          </a></h4>
          <h6 class="card-details">
            By PPEIV2 &#8226; 
            <i class="fa fa-clock-o" aria-hidden="true"></i> 
            <span id="h-time-1"></span> &#8226;
              <?= $this->registerJs('var ht1 = $("#h-time-1"); ht1.text("Published "+moment("'.$contents[1]['date'].'").fromNow());'); ?>
            <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
            <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
          </h6>
        </div>
      </div>
    </div>
    <div class="card hvr-float">
      <img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
      <div class="card-img-overlay">
        <div class="card-content">
          <h4><a class="card-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($contents[1]['date'], 0, -12)) ?>/<?= $contents[1]['slug'] ?>">
            <?= $contents[1]['title'] ?>
          </a></h4>
          <h6 class="card-details">
            By PPEIV2 &#8226; 
            <i class="fa fa-clock-o" aria-hidden="true"></i> 
            <span id="h-time-1"></span> &#8226;
              <?= $this->registerJs('var ht1 = $("#h-time-1"); ht1.text("Published "+moment("'.$contents[1]['date'].'").fromNow());'); ?>
            <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
            <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
          </h6>
        </div>
      </div>
    </div>
    
    

  </div>
</div>

<?= Yii::$app->view->renderFile('@app/views/articles-layouts/empty-list.php') ?>

