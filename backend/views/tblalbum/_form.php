<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblalbum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblalbum-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_date')->widget(DatePicker::classname(), 
    	[
			'options' => ['required' => 'required'],
			'pluginOptions' => [
			'autoclose'=>true,
			'todayHighlight' => true,
			//'startDate' => date("yyyy-m-dd H:i:s"),
			'format' => 'yyyy-m-dd',
			],
		]); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
