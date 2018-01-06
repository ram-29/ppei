<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\helpers\Transform;

$this->title = 'Gallery';
?>
<?= Yii::$app->view->renderFile('@app/views/layouts/navbar.php') ?>

<div class="site-gallery">
	<section id="gallery" class="container">
		<div class="row">
			<div class="col-md">
				<h1 class="gallery-header">
					<i class="fa fa-picture-o" aria-hidden="true"></i>
					Gallery
				</h1>

				<a href="/gallery"><h2 id="mAlbum" class="mDisplay hvr-icon-back"></h2></a>
				<?php $baseUrl = Yii::getAlias('@mBackEnd').'/uploads/images/albums/'; ?>

				<div id="nano-gallery" data-nanogallery2>
					<?php foreach($albums as $album) :?>
						<a href="" data-ngkind="album" data-ngid="<?= $album['id'] ?>" data-ngthumb="<?= Transform::extractCacheUrl($baseUrl.$album['name'].'/'.$album['images'][0]['name'], '200', '200') ?>"><?= $album['name'] ?></a>
						<?php foreach($album['images'] as $image) :?>
							<a href="<?= $baseUrl.$album['name'].'/'.$image['name'] ?>" data-ngid="<?= $image['id'].'/' ?>" data-ngalbumid="<?= $album['id'] ?>" data-ngthumb="<?= Transform::extractCacheUrl($baseUrl.$album['name'].'/'.$image['name'], '200', '200') ?>">
								<?= $image['name'] ?> / <?= $album['name'] ?>
							</a>
						<?php endforeach ?>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>
</div>

<?= Yii::$app->view->renderFile('@app/views/layouts/footer.php') ?>