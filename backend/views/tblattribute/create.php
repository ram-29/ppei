<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblattribute */

$this->title = 'Add Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblattribute-create">
	<div class="panel-header-wrapper">
    	<h3><?= Html::encode($this->title) ?></h3>
	</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
