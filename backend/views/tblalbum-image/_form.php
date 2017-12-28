<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\TblalbumImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblalbum-image-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

		<?= $form->field($model, 'imageNames[]')->widget(FileInput::classname(), [
		    'options' => ['multiple' => true, 'accept' => 'image/*'],
		    'pluginOptions' => ['previewFileType' => 'image', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads/images/albums']), 'maxFileCount' => 10]
		]); ?>

        <?= $form->field($model, 'album_id')->hiddenInput(['value'=> $id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
