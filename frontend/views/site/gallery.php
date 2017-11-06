<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Gallery';
?>
<?= Yii::$app->view->renderFile('@app/views/layouts/navbar.php') ?>

<div class="site-gallery">
	<section id="gallery" class="container">
		<div class="row">
			<div class="col-md">
				<h1 class="gallery-header">
				<i class="fa fa-picture-o" aria-hidden="true"></i>
					<a href="/gallery">Gallery</a>
				</h1>

				<!-- Gallery Content -->
				<?php $baseUrl = Yii::getAlias('@mBackEnd').'/uploads/images/albums'; ?>
				<div id="nano-gallery" data-nanogallery2='{
					displayBreadcrumb: false
				}'>
					<?php foreach($albums as $album) :?>
						<a href="" data-ngkind="album" data-ngid="<?= $album['id'] ?>" data-ngthumb="<?= $baseUrl.'/'.$album['name'].'/'.$album['images'][0]['name'] ?>"><?= $album['name'] ?></a>
						<?php foreach($album['images'] as $image) :?>
							<a href="<?= $baseUrl.'/'.$album['name'].'/'.$image['name']; ?>" data-ngid="<?= $image['id'] ?>" data-ngalbumid="<?= $album['id'] ?>" data-ngthumb="<?= $baseUrl.'/'.$album['name'].'/'.$image['name']; ?>"><?= $image['name'] ?> / <?= $album['name'] ?></a>
						<?php endforeach ?>
					<?php endforeach ?>
				</div>

			</div>
		</div>
	</section>
</div>

<?= Yii::$app->view->renderFile('@app/views/layouts/footer.php') ?>