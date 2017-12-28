<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblhub */

$this->title = 'UPDATE: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Knowledge Hub', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblhub-update">
	<div class="panel-header-wrapper">
    	<h3><span class="glyphicon icon glyphicon-edit"></span> <?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_editform', [
        'model' => $model,
    ]) ?>

</div>
