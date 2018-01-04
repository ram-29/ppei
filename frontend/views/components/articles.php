<div id="components-articles">
	<?php switch(count($contents)) :
		case 0:?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/no-articles.php') ?>
		<?php break ?>
		<?php case 1:?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/head-one.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php case 2: ?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/head-two.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>			
		<?php break ?>
		<?php case 3: ?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/head-three.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php case 4: ?>

		<?php break ?>
		<?php case 5: ?>

		<?php break ?>
		<?php case 6: ?>

		<?php break ?>


	<?php endswitch ?>	
</div>