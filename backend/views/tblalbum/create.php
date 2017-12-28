<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblalbum */

$this->title = 'Create Album';
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalbum-create">
	<div class="folder-form">
		<div class="panel-header-wrapper">
	    	<h3><span class="glyphicon glyphicon-picture"></span> <?= Html::encode($this->title) ?></h3>
	    </div>
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>
</div>
