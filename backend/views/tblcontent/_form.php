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

					

					    <?php foreach ($feature as $attribute) : ?> 
					    	<div class="panel-header-wrapper">
					    		<h3 class="text-info"><?= $attribute->feature ?></h3>
					    	</div>
							<?php $att=unserialize($attribute->attributes) ?>

								<?php foreach ($att as $key => $value) : ?>

									<?php if($key=="user") :?>
										<?= $form->field($model, $key)->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>

									<?php elseif(($key=="date") && ($attribute->feature!="Calendar of Activities")):?>
										<?= $form->field($model, $key)->widget(DatePicker::classname(), [
								            'options' => ['value' => date('M. d, Y'), 'required' => 'required'],
								            'pluginOptions' => [
								            'autoclose'=>true,
								            'todayHighlight' => true,
								            //'startDate' => date("yyyy-MM-dd H:i:s"),
								            'format' => 'M. d, yyyy'
								                ]
								            ]); ?>

								    <?php elseif($key=="date_start") :?>
										<?= $form->field($model, $key)->widget(DatePicker::classname(), [
								            'options' => ['value' => date('M. d, Y'), 'required' => 'required'],
								            'pluginOptions' => [
								            'autoclose'=>true,
								            'todayHighlight' => true,
								            //'startDate' => date("yyyy-MM-dd H:i:s"),
								            'format' => 'M. d, yyyy'
								                ]
								            ]); ?>

								    <?php elseif($key=="date_end") :?>
										<?= $form->field($model, $key)->widget(DatePicker::classname(), [
								            'options' => ['value' => date('M. d, Y'), 'required' => 'required'],
								            'pluginOptions' => [
								            'autoclose'=>true,
								            'todayHighlight' => true,
								            'startDate' => date("yyyy-MM-dd H:i:s"),
								            'format' => 'M. d, yyyy'
								                ]
								            ]); ?>

									<?php elseif(($key=="images") && ($attribute->feature=="News and Events")) : ?>

									<?= $form->field($model, $key)->widget(FileInput::classname(), [
		    							'options' => ['multiple' => false, 'accept' => 'image/*'],
		    							'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads/images/events']), 'maxFileCount' => 10]
										]); ?>

									<?php elseif(($key=="contents") && ($attribute->feature=="About Us")) : ?>

									<?= $form->field($model, $key)->widget(CKEditor::className(), [
								        'options' => ['rows' => 30, 'required' => 'required'],
								        'preset' => 'custom',
								        'value' => '',
								    ]) ?>

									<?php elseif(($key=="images") && ($attribute->feature=="Stories of Change")) : ?>
										<?= $form->field($model, $key)->widget(FileInput::classname(), [
									    'options' => ['multiple' => false, 'accept' => 'image/*','value' => ''],
									    'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads/images/story'])]
									]); ?>

								<?php elseif(($key=="images") && ($attribute->feature=="Partners")) : ?>
										<?= $form->field($model, $key)->widget(FileInput::classname(), [
									    'options' => ['multiple' => false, 'accept' => 'image/*', 'value' => ''],
									    'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads/images/parter'])]
									]); ?>

									<?php elseif(($key=="files") && ($attribute->feature=="Knowledge Hub")) : ?>
										<?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
									    'options' => ['multiple' => true, 'accept' => 'file/*', 'value' => '', 'required'=>'required'],
									    'pluginOptions' => ['previewFileType' => 'file', 'showUpload' => false,  'uploadUrl' => Url::to(['/uploads/hubfiles'])]
									]); ?>

									<?php elseif($key=="files") : ?>
										<?= $form->field($model, $key)->widget(FileInput::classname(), [
									    'options' => ['multiple' => false, 'accept' => 'file/*', 'value' => '', 'required'=>'required'],
									    'pluginOptions' => ['previewFileType' => 'file', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads'])]
									]); ?>

									<?php elseif($key=="images") : ?>
										<?= $form->field($model, $key)->widget(FileInput::classname(), [
									    'options' => ['multiple' => false, 'accept' => 'image/*', 'value' => '', 'required' => 'required'],
									    'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads'])]
									]); ?>

									<?php elseif($key=="contents") : ?>
										<?= $form->field($model, $key)->textArea(['value'=>'', 'rows'=>10, 'required' => 'required'])?>

								    <?php elseif($key=="status") :?>
								            <?= $form->field($model, 'status')->dropDownList(['Active'=>'Active','Inactive'=>'Inactive'], ['value' => '']) ?>

								    <?php elseif(($key=="date") && ($attribute->feature=='Calendar of Activities')) : ?>
										
										<?= $form->field($model, $key)->hiddenInput(['value' => date('M. d, Y')])->label(false) ?>

									<?php else : ?>
										
										<?= $form->field($model, $key)->textInput(['value'=>'', 'required' => 'required'])?>

									<?php endif ?>
									
								<?php endforeach ?></br>
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
