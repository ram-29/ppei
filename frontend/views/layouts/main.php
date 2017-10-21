<?php

/* @var $this \yii\web\View */
/* @var $content string */

// use yii\bootstrap\Nav;
// use common\widgets\Alert;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/favicon.ico']);?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<h1>PPEI</h1>
				<h6>Working Towards Building a<br>Green Economy and Sustainable Local Communities</h6>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">News & Updates</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">PPEI Knowledge Hub</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							About Us
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Who We Are</a>
							<a class="dropdown-item" href="#">What We Do</a>
							<a class="dropdown-item" href="#">Stories of Change</a>
							<a class="dropdown-item" href="#">Partners</a>
							<a class="dropdown-item" href="#">Gallery</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
				</ul>
			</div>
		</div>
    </nav>
    
    <main>
        <?= $content ?>
	</main>

	<footer>
        <div class="container">
			<div class="row">
				<div class="col-md-3">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, quia enim culpa vero nobis ipsam temporibus dicta commodi voluptas corporis veritatis unde provident quidem quo suscipit excepturi, officia eum rerum.</p>
					
				</div>
				<div class="col-md-3">
					<p>Harum placeat dolore ea, doloribus quo numquam ipsam ipsum accusantium praesentium unde nemo minima sit vero, magni corporis quam iusto quibusdam nam rerum. Placeat ipsum, ea voluptatum ex quia nulla!</p>
					
				</div>
				<div class="col-md-3">
					<p>Velit odio sed aspernatur quisquam asperiores sint quibusdam voluptatum mollitia ab. Fugit ea obcaecati error ipsa? Id accusamus culpa ratione, nisi assumenda ab enim consectetur porro itaque voluptatibus ducimus mollitia.</p>
					
				</div>
				<div class="col-md-3">
					<p>Iure omnis ducimus praesentium veniam. Minima sed ut impedit quisquam amet consectetur totam, consequatur ad corporis natus optio omnis veritatis cumque corrupti et sit necessitatibus neque voluptates expedita id iusto.</p>
				</div>
			</div>
		</div>
	</footer>

	<div style="height:500px;"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
