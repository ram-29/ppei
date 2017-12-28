<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblhub */

$this->title = $model->file_name;
$this->params['breadcrumbs'][] = ['label' => 'Knowledge Hub', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhub-view">
    <div class="panel-header-wrapper">
        <h3><span class="glyphicon icon glyphicon-cloud-download"></span> <?= Html::encode($this->title) ?></h3>
         <?= Html::a("<span class='glyphicon mini-icon glyphicon-pencil'></span>", ['update', 'id' => $model->id]) ?>
         <?= Html::a("<span class='glyphicon mini-icon glyphicon-trash'></span>", ['delete', 'id' => $model->id], [
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                    ],
            ]) ?>
    </div>
</div>


<?= \yii2assets\pdfjs\PdfJs::widget([
  'width'=>'100%',
  'height'=>'1000px',
  'url'=> Url::base().'/uploads/hubfiles/'.$model->file_name
]);
?>
