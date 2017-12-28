<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Tblfeature;
use backend\models\Tblgroup;
use kartik\date\DatePicker;
use kartik\file\FileInput; 
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcontent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcontent-form">

   <div class="container-fluid form-wrapper">
			<row>
				<div class="col-md-3">
					<div class="info-wrapper">
						<span class="glyphicon info-wrapper-icon glyphicon-info-sign"></span> All fields here are required to be filled-in.
					</div>
				</div>

				<div class="col-md-9 add-form-wrapper">
					<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

					

					    <?php foreach ($value as $val) : ?> 
					    	<div class="panel-header-wrapper">
					    		
					    	</div>
									<?php if($val->attribute=="user") :?>
										<?= $form->field($model, $val->attribute)->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>

									<?php elseif($val->attribute=="date"):?>
										<?= $form->field($model, $val->attribute)->widget(DatePicker::classname(), [
								            'options' => ['value' => $val->value, 'required' => 'required'],
								            'pluginOptions' => [
								            'autoclose'=>true,
								            'todayHighlight' => true,
								            'startDate' => date("yyyy-MM-dd H:i:s"),
								            'format' => 'M-d-y'
								                ]
								            ]); ?>

								            <?php echo DatePicker::widget([
										    'name' => $val->attribute,
										    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
										    'value' => date('M. d, Y'),
										    'pluginOptions' => [
										        'autoclose'=>true,
										        'format' => 'M. d, yyyy',
										        'todayHighlight' => true,
										    ]
										]); ?>


								    <?php elseif($val->attribute=="date_start") :?>
										<?= $form->field($model, $val->attribute)->widget(DatePicker::classname(), [
								            'options' => ['value' => $val->value, 'required' => 'required'],
								            'pluginOptions' => [
								            'autoclose'=>true,
								            'todayHighlight' => true,
								            'startDate' => date("yyyy-MM-dd H:i:s"),
								            'format' => 'M-d-y'
								                ]
								            ]); ?>

								    <?php elseif($val->attribute=="date_end") :?>
										<?= $form->field($model, $val->attribute)->widget(DatePicker::classname(), [
								            'options' => ['value' => $val->value, 'required' => 'required'],
								            'pluginOptions' => [
								            'autoclose'=>true,
								            'todayHighlight' => true,
								            'startDate' => date("yyyy-MM-dd H:i:s"),
								            'format' => 'M-d-y'
								                ]
								            ]); ?>

									<?php elseif($val->attribute=="images") : ?>

									<?= $form->field($model, $val->attribute)->widget(FileInput::classname(), [
		    							'options' => ['multiple' => false, 'accept' => 'image/*', 'value' => $val->value, 'required'=>'required'],
		    							'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => Url::to(['/uploads/images/events']), 'maxFileCount' => 10]
										]); ?>

									<?php echo FileInput::widget([
										    'name' => $val->attribute,
										    'options'=>[
										        'multiple'=>false
										    ],
										    'pluginOptions' => [
										        'uploadUrl' => Url::to(['/site/file-upload']),
										        'maxFileCount' => 10
										    ]
										]); ?>



									
									<?php elseif($val->attribute=="files") : ?>
										<?= $form->field($model, $val->attribute)->widget(FileInput::classname(), [
									    'options' => ['multiple' => false, 'accept' => 'file/*', 'value' => $val->value, 'required'=>'required'],
									    'pluginOptions' => ['previewFileType' => 'file', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads/images/story'])]
									]); ?>


									<?php elseif(($val->attribute=="contents") && ($val->feature_id=='26')) : ?>

									<?= $form->field($model, $val->attribute)->widget(CKEditor::className(), [
								        'options' => ['rows' => 50, 'value' => $val->value, 'required' => 'required'],
								        'preset' => 'custom',
								    ]) ?>

									<?php elseif($val->attribute=="contents") : ?>
										<?= $form->field($model, $val->attribute)->textArea(['value'=>$val->value, 'rows'=>10, 'required' => 'required'])?>

								    <?php elseif($val->attribute=="status") :?>
								            <?= $form->field($model, 'status')->dropDownList(['Active'=>'Active','Inactive'=>'Inactive'], ['value' => $val->value]) ?>


									<?php else : ?>
										
										<?= $form->field($model, $val->attribute)->textInput(['value'=>$val->value, 'required' => 'required'])?>

									<?php endif ?>
									
					    <?php endforeach ?>

					    <div class="form-group">
			        		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    		</div>
					 <?php ActiveForm::end(); ?>
				</div>
			</row>
		</div>
	</div>

</div>
