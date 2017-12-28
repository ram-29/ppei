<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblhubPhase */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Program Phases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblhub-phase-view">
    <div class="panel-header-wrapper">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'phase',
            //'status',
        ],
    ]) ?>

</div>
