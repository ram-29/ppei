<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblfolder */

$this->title = 'Create Folder';
$this->params['breadcrumbs'][] = ['label' => 'Folders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfolder-create">
	<div class="folder-form">
		<div class="panel-header-wrapper">
	    	<h3><span class="glyphicon icon glyphicon-folder-close"></span> <?= Html::encode($this->title) ?></h3>
	    </div>
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>
</div>
