<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = ['label' => 'Folders', 'url' => ['tblfolder/index', 'folder_id'=> $folder_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfile-index">

    <div class="panel-header-wrapper">
    	<?= Yii::$app->session->getFlash('error'); ?>
        <h3><span class="glyphicon icon glyphicon-folder-open"></span> <?= Html::encode($this->title) ?></h3>
    </div>

    <p>
        <?= Html::a('Add File', ['create', 'folder_id' => $folder_id], ['class' => 'btn btn-success']) ?>
    </p>
	</br>
	<table class="table table-striped">
		<th>File Name</th><th>Date Uploaded</th><th>Action</th>
		<?php foreach($files as $file) :?>
		  <tr>
		  	<td width="600">
		     <?= Html::a($file->name, ['tblfile/view', 'folder_id'=> $file->folder_id, 'file_id'=>$file->id]); ?></br>
		 	</td>
		 	<td>
		 		<?= $file->date ?>
		 	</td>
		 	<td>
		 		<?= Html::a('Download', ['download', 'id' => $file->id, 'folder_id'=>$file->folder_id], [
            'class' => 'btn btn-success',
        		]) ?>

		 		<?= Html::a('Delete', ['delete', 'id' => $file->id, 'folder_id'=>$file->folder_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            		],
       			 ]) ?>
		 	</td>
		  </tr>
		<?php endforeach ?>
	</table>
</div>
