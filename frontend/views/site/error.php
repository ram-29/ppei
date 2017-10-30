<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

  <div class="card">
    <div class="card-body">
      <div class="card-content">
        <h4><?= Html::encode($this->title) ?></h4>
        <p class="card-text lead text-danger"><?= nl2br(Html::encode($message)) ?></p>
        <a href="/" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-logo">
        <img src="images/logo/ppei-logo.png" width="110" height="70" alt="PPEI Logo">
        <p class="lead">Philippine Poverty-Environment Initiative</p>
      </div>
    </div>
    <div class="card-footer text-muted">
      <h6>The above error occurred while the Web server was processing your request.</h6>
      <h6>Please contact us if you think this is a server error. Thank you.</h6>
    </div>
  </div>

</div>
