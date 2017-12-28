<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tblfeature;
use kartik\date\DatePicker;
use kartik\file\FileInput; 
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcontent */

$this->title = 'Add Content';
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index', 'feature_id' => $feature_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcontent-create">

	<?= $this->render('_form', [
        'model' => $model,
        'feature' => $feature,
        'feature_id' => $feature_id,
    ]) ?>

</div>
