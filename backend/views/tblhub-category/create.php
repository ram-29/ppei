<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblhubCategory */

$this->title = 'Add Hub Category';
$this->params['breadcrumbs'][] = ['label' => 'Hub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhub-category-create">
	<div class="panel-header-wrapper">
    	<h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
