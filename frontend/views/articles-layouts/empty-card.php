<?php

use yii\helpers\Html;
?>
<div id="empty-card" class="card">
  <?= Html::img('@web/images/wireframe/image.png', [ 'class' => 'card-img' ]); ?>
  <div class="card-img-overlay">
    <div class="card-content">
      <div class="card-title"></div>
      <div class="card-details"></div>
    </div>
  </div>
</div>