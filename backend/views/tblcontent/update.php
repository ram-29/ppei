<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcontent */

$this->title = 'Update: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Content Manager', 'url' => ['index', 'feature_id' => $model->feature_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblcontent-update">
	<div class="panel-header-wrapper">
    	<h3><span class="glyphicon glyphicon-edit"></span> <?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('content', [
        'model' => $model,
        'value' => $value,
        'feature_id' => $feature_id,
        'feature' => $feature,
    ]) ?>

</div>
