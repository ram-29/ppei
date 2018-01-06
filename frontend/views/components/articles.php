<div id="components-articles">
	<?php switch(count($contents)) :
		case 0:?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/no-articles.php') ?>
		<?php break ?>
		<?php case 1:?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/one.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php case 2: ?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/two.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php case 3: ?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/three.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php case 4: ?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/four.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php case 5: ?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/five.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php case 6: ?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/six.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
		<?php break ?>
		<?php default :?>
			<?= Yii::$app->view->renderFile('@app/views/articles-layouts/main.php', ['feature' => $feature, 'slug' => $slug, 'contents' => $contents]) ?>
	<?php endswitch ?>	
</div>