<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbldatatype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbldatatype-form">

	<div class="form-wrapper">
	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'dataType')->textInput(['maxlength' => true]) ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</div>

</div>
