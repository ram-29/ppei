<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tblattribute;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblfeature */

$this->title = 'Add Feature';
$this->params['breadcrumbs'][] = ['label' => 'Web Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfeature-create">
	<div class="panel-header-wrapper">
	    <h3><span class="glyphicn icon glyphicon-plus"></span> <?= Html::encode($this->title) ?></h3>
    </div>
	
	<?= $this->render('_form', [
        'model' => $model,
        'id'=> $id,
        'options' => $options,
    ]) ?>
    
</div>
