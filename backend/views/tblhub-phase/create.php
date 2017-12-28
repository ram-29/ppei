<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblhubPhase */

$this->title = 'Add Program Phase';
$this->params['breadcrumbs'][] = ['label' => 'Program Phases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhub-phase-create">
	<div class="panel-header-wrapper">
    	<h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
