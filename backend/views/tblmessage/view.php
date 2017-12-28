<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblmessage */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Message', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmessage-view">

    <div class="panel-header-wrapper">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <label>From: </label> <?= $model->name .' ( '.$model->email.')' ?> </br>
    <div class="message-date"><?= $model->date ?></div></br>

    <div class="message-body"><?= $model->message ?></div> 

    <?php /* DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'subject',
            'message:ntext',
            'date',
        ],
    ]) */?>

</div>
