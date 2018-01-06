<?php

use yii\helpers\Html;
?>
<?= Yii::$app->view->renderFile('@app/views/articles-layouts/articles-header.php', ['feature' => $feature]) ?>

<?php $headers = array_splice($contents, 0, 3); ?>
<?php $subHeads = array_splice($contents, 0, 3); ?>

<div id="articles-head" class="row">
  <div class="col-md-7">
    <div class="card hvr-float">
      <img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
      <div class="card-img-overlay">
        <div class="card-content">
          <h4><a class="card-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($headers[0]['date'], 0, -3)) ?>/<?= $headers[0]['slug'] ?>">
            <?= $headers[0]['title'] ?>
          </a></h4>
          <h6 class="card-details lead">
            By PPEIV2 &#8226; 
            <i class="fa fa-clock-o" aria-hidden="true"></i> 
            <span id="h-time-0"></span> &#8226;
              <?= $this->registerJs('var ht0 = $("#h-time-0"); ht0.text("Published "+moment("'.$headers[0]['date'].'").fromNow());'); ?>
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
          <h4><a class="card-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($headers[1]['date'], 0, -3)) ?>/<?= $headers[1]['slug'] ?>">
            <?= $headers[1]['title'] ?>
          </a></h4>
          <h6 class="card-details">
            By PPEIV2 &#8226; 
            <i class="fa fa-clock-o" aria-hidden="true"></i> 
            <span id="h-time-1"></span> &#8226;
              <?= $this->registerJs('var ht1 = $("#h-time-1"); ht1.text("Published "+moment("'.$headers[1]['date'].'").fromNow());'); ?>
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
          <h4><a class="card-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($headers[2]['date'], 0, -3)) ?>/<?= $headers[2]['slug'] ?>">
            <?= $headers[2]['title'] ?>
          </a></h4>
          <h6 class="card-details">
            By PPEIV2 &#8226; 
            <i class="fa fa-clock-o" aria-hidden="true"></i> 
            <span id="h-time-2"></span> &#8226;
              <?= $this->registerJs('var ht1 = $("#h-time-2"); ht1.text("Published "+moment("'.$headers[2]['date'].'").fromNow());'); ?>
            <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
            <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
          </h6>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="articles-subhead" class="row">
  <?php $j = 0; ?>
  <?php foreach($subHeads as $subHead) :?>
    <div class="col-md-4">
      <div class="card hvr-float">
        <img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
        <div class="card-img-overlay">
          <div class="card-content">
            <h4><a class="card-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($subHead['date'], 0, -12)) ?>/<?= $subHead['slug'] ?>">
              <?= $subHead['title'] ?>
            </a></h4>
            <h6 class="card-details">
              By PPEIV2 &#8226; 
              <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span id="sh-time-<?= $j ?>"></span> &#8226;									
                <?= $this->registerJs('var sh'.$j.' = $("#sh-time-'.$j.'"); sh'.$j.'.text("Published "+moment("'.$subHead['date'].'").fromNow());'); ?>
              <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
              <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
            </h6>
          </div>
        </div>
      </div>
    </div>
    <?php $j++; ?>
  <?php endforeach ?>
</div>

<?= Yii::$app->view->renderFile('@app/views/articles-layouts/articles-list.php', ['contents' => $contents, 'slug' => $slug]) ?>
