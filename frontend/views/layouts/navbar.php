<?php

use common\models\Feature;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$features = ArrayHelper::getColumn(Feature::find()->asArray()->all(), 'name');

$hyphenated = function (string $string){
	return str_replace(' ', '-', $string);
};

$wordify = function (string $string){
	return str_replace('&', 'and', $string);
};

$lowered = function (string $string){
	return strtolower($string);
};

$build = function(string $a, string $b){
	return [
		'name' => $a,
		'slug' => $b
	];
};

$slugged = array_map(
	$lowered, 
		array_map($wordify,
			array_map($hyphenated, $features))
);

$links = array_map($build, $features, $slugged);
?>
<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
		<a class="navbar-brand" href="/">
			<div class="logo-container">
				<?= Html::img('@mFrontEnd/images/logo/ppei-logo.png', [
					'width' => '70',
					'height' => '50',
					'alt' => 'PPEI Logo'
				]); ?>
				<h1 class="abbr">PPEI</h1>
			</div>
			<h6 class="tagline">Working Towards Building a<br>Green Economy and Sustainable Local Communities</h6>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<?php foreach($links as $link) :?>
					<?php switch($link['name']) :
						case 'News & Events' :?>
							<li id="<?= $link['slug'] ?>" class="nav-item">
								<a class="nav-link hvr-icon-bob" href="/<?= $link['slug'] ?>"><?= $link['name'] ?></a>
							</li>
						<?php break; ?>
						<?php case 'Stories of Change' :?>
							<li id="<?= $link['slug'] ?>" class="nav-item">
								<a class="nav-link hvr-icon-buzz-out" href="/<?= $link['slug'] ?>"><?= $link['name'] ?></a>
							</li>
						<?php break; ?>
						<?php case 'Gallery' :?>
							<li id="<?= $link['slug'] ?>" class="nav-item">
								<a class="nav-link hvr-icon-grow" href="/<?= $link['slug'] ?>"><?= $link['name'] ?></a>
							</li>
						<?php break; ?>
					<?php endswitch ?>
				<?php endforeach ?>
			</ul>
		</div>
  </div>
</nav>