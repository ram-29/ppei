<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tblattribute;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblfeature */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblfeature-form">
	<div class="container-fluid form-wrapper">
			<row>
				<div class="col-md-4">
					<div class="info-wrapper">
						<span class="glyphicon info-wrapper-icon glyphicon-info-sign"></span> The field that has asteries (*) sign is a required field. The Feature Name must be relevant to the function of that feature, while the attributes are the fields (input fields) needed for the feature. Later, when you add content to this feature, you will be asked only to input the data base on the selected attributes.
					</div>
				</div>

				<div class="col-md-8 add-form-wrapper">
				    <?php $form = ActiveForm::begin(); ?>

				    <?= $form->field($model, 'feature')->textInput(['maxlength' => true]) ?>

				     <label>*Existing Attributes:</label><br>
				     <div class="options-wrapper">
				          <?php foreach($attributes as $values) :?>
				          	<?php $att = unserialize($values->attributes) ?>
				          		<?php foreach ($att as $key => $value) : ?>
						          	<div class="label-style">
						          		<?= $key ?>
							        </div>
							    <?php endforeach ?>
				          <?php endforeach ?><br>
				      </div>

				      <label>Select New Attributes:</label><br>
				     <div class="options-wrapper">
				         <?php foreach($options as $option) :?>
				          	<div class="label-style">
					            <input type="checkbox" name="attributes[<?= $option->attribute ?>]" value="<?= $option->data_type ?>">
					            <label><?= $option->attribute ?></label><br>
					        </div>
				          <?php endforeach ?><br>
				      </div>

			          <label>*Would you like this feature to be visible to frontend? </label> 
			          	<input type="radio" name="isVisible" value="1"> Yes 
			          	<input type="radio" name="isVisible" value="0"> No
			          </br></br>
				    <div class="form-group">
				        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				    </div>
				    <?php ActiveForm::end(); ?>
				</div>
			</row>
	</div>
</div>
