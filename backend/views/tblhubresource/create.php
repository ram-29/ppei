<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblhubresource */

$this->title = 'Add Knlowledge Hub Resource-Type';
$this->params['breadcrumbs'][] = ['label' => 'Hub Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhubresource-create">
	<div class="panel-header-wrapper">
    	<h1><?= Html::encode($this->title) ?></h1>
    </div>

    	<?= $this->render('_form', [
        'model' => $model,
    	]) ?>

</div>
