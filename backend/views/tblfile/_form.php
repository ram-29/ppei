<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblfile-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
            'options' => ['multiple' => true, 'accept' => 'file/*'],
            'pluginOptions' => ['previewFileType' => 'file', 'showUpload' => false, 'uploadUrl' => Url::to(['/uploads/adminfolder']), 'maxFileCount' => 5]
        ]); ?>

    <?= $form->field($model, 'folder_id')->hiddenInput(['value' => $folder_id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
