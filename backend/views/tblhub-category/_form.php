<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblhubPhase;

/* @var $this yii\web\View */
/* @var $model backend\models\TblhubCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblhub-category-form">
	<div class="form-wrapper">

	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'id_phase')->dropDownList(
	        ArrayHelper::map(TblhubPhase::find()->all(),'id','phase'),
	            ['prompt'=>'Select Phase']
	        ); ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</div>

</div>
