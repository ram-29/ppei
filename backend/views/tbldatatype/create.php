<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbldatatype */

$this->title = 'Add Data Type';
$this->params['breadcrumbs'][] = ['label' => 'Data Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldatatype-create">
	<div class="panel-header-wrapper">
    	<h3><span class="glyphicon icon glyphicon-edit"></span> <?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
