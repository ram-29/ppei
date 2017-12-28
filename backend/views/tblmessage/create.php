<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblmessage */

$this->title = 'Create Tblmessage';
$this->params['breadcrumbs'][] = ['label' => 'Tblmessages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmessage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
