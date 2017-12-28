<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblhub */

$this->title = 'ADD RESOURCES TO KNOWLEDGE HUB';
$this->params['breadcrumbs'][] = ['label' => 'Knowledge Hub', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Add Resources to Knowledge Hub';
?>
<div class="tblhub-create">

	<div class="panel-header-wrapper">
    	<h3><div class="glyphicon icon glyphicon-edit"></div> <?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
