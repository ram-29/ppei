<?php

use yii\helpers\Html;
?>
<div class="row">
  <div id="error" class="col-md-8">
    <p>There are no available articles at this time. Please come back later.</p>
  </div>
  <div class="col-md-4">
    <?= Yii::$app->view->renderFile('@app/views/components/calendar.php') ?>
  </div>
</div>