<div id="articles-list" class="row">
  <div class="col-md-8">
    <ul class="list-group">
      <?php $i = 0; ?>
      <?php foreach($contents as $content) :?>
        <li class="list-group-item">
          <div class="item-content hvr-forward">
            <img src="https://dummyimage.com/400x300/558B2F/fff" alt="...">
            <div class="item-overview">
              <h4><a class="item-title" href="/<?= $slug ?>/<?= str_replace('-', '/', substr($content['date'], 0, -12)) ?>/<?= $content['slug'] ?>">
                <?= $content['title'] ?>
              </a></h4>
              <p class="item-summary"><?= $content['content'] ?></p>
              <h6 class="item-details">
                By PPEIV2 &#8226; 
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                  <span id="l-time-<?= $i ?>"></span> &#8226;
                  <?= $this->registerJs('var lt'.$i.' = $("#l-time-'.$i.'"); lt'.$i.'.text("Published "+moment("'.$content['date'].'").fromNow());'); ?>
                <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
                <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
              </h6>
            </div>
          </div>
        </li>
        <?php $i++; ?>
      <?php endforeach ?>
    </ul>
  </div>
  <div class="col-md-4">
    <?= Yii::$app->view->renderFile('@app/views/components/calendar.php') ?>
  </div>
</div>