<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblalbumImage */

$this->title = 'Update Tblalbum Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblalbum Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblalbum-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
