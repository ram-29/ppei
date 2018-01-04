<?php

use yii\helpers\Html;
?>
<div id="empty-list" class="row">
  <div class="col-md-8">
    <ul class="list-group">
      <li class="list-group-item">
        <div class="item-content">
          <?= Html::img('@web/images/wireframe/image.png', [ 'class' => 'img-fluid' ]); ?>
          <div class="item-overview">
            <div class="item-title"></div>
            <div class="item-summary"></div>
          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="item-content">
          <?= Html::img('@web/images/wireframe/image.png', [ 'class' => 'img-fluid' ]); ?>
          <div class="item-overview">
            <div class="item-title"></div>
            <div class="item-summary"></div>
          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="item-content">
          <?= Html::img('@web/images/wireframe/image.png', [ 'class' => 'img-fluid' ]); ?>
          <div class="item-overview">
            <div class="item-title"></div>
            <div class="item-summary"></div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="col-md-4">
    <?= Yii::$app->view->renderFile('@app/views/components/calendar.php') ?>
  </div>
</div>