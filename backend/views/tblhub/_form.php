<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblhubCategory;
use backend\models\TblhubResource;
use backend\models\TblhubPhase;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblhub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblhub-form">
	<div class="form-wrapper">

	    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	    <?= $form->field($model, 'fileNames[]')->widget(FileInput::classname(), [
		    'options' => ['multiple' => true, 'accept' => 'file/*'],
		    'pluginOptions' => ['previewFileType' => 'file', 'showUpload' => true, 'uploadUrl' => Url::to(['/uploads/hubfiles']), 'maxFileCount' => 10]
		]); ?>

	    <?= $form->field($model, 'phase_id')->dropDownList(
        ArrayHelper::map(TblhubPhase::find()->all(),'id','phase'),
        [
            'prompt'=>'Select',
            'onchange'=>'
                 $.post("index.php?r=tblhub-category/hubcategories&id='.'"+$(this).val(),function(data){
                    $("select#tblhub-hcategory_id").html(data);
                });'

        ]); ?>

	    <?= $form->field($model, 'hcategory_id')->dropDownList(ArrayHelper::map(TblhubCategory::find()->all(),'id', 'category'), 
	    	[
	    		'prompt' => 'Select Hub Category', 
	    		
            ]) ?>

	     <?= $form->field($model, 'resource_id')->dropDownList(ArrayHelper::map(TblhubResource::find()->all(),'id', 'name'), ['prompt' => 'Select Hub Resource-type']) ?>

	    <?= $form->field($model, 'status')->dropDownList(['Active'=>'Active','Inactive'=>'Inactive']) ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>
</div>
