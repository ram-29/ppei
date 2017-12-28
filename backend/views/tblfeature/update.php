<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblfeature */

$this->title = 'Update ' . $model->feature;
$this->params['breadcrumbs'][] = ['label' => 'Web Ffeatures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblfeature-update">

	<div class="panel-header-wrapper">
    	<h3><span class="glyphicn glyphicn-edit"></span> <?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('_updateForm', [
        'model' => $model,
        'options' => $options,
        'attributes' => $attributes,
    ]) ?>

</div>
