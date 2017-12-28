<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tbldatatype;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblattribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblattribute-form">

	<div class="form-wrapper">
	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'attribute')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'data_type')->dropDownList(ArrayHelper::map(Tbldatatype::find()->all(),'dataType', 'dataType')) ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</div>

</div>
