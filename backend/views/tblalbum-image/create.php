<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblalbumImage */

$this->title = 'Upload Images';

$this->params['breadcrumbs'][] = ['label' => 'Album', 'url' => ['tblalbum-image/index', 'id'=>$id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalbum-image-create">
	<div class="panel-header-wrapper">
    	<h3><span class="glyphicon icon glyphicon-cloud-upload"></span> <?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'id'=> $id,
    ]) ?>

</div>
