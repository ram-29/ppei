<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblfile */

$this->title = 'Upload Files';
$this->params['breadcrumbs'][] = ['label' => 'Folder', 'url' => ['index', 'folder_id' => $folder_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfile-create">
	<div class="panel-header-wrapper">
    	<h3><span class="glyphicon icon glyphicon-cloud"></span> <?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'folder_id' => $folder_id,
    ]) ?>

</div>
