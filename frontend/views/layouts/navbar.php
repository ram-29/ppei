<?php

use yii\helpers\Html;
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
				<li class="nav-item">
					<a class="nav-link hvr-icon-bob" href="/news-and-events">News & Events</a>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-icon-buzz-out" href="/stories-of-change">Stories of Change</a>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-icon-bounce" href="/knowledge-hub">Knowledge Hub</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="/about" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="/about#who-we-are">Who We Are</a>
						<a class="dropdown-item" href="/about#what-we-do">What We Do</a>
						<a class="dropdown-item" href="/about#stories-of-change">Stories of Change</a>
						<a class="dropdown-item" href="/about#partners">Partners</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-icon-grow" href="/gallery">Gallery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link hvr-icon-float-away" href="/contact">Contact Us</a>
				</li>
			</ul>
		</div>
  </div>
</nav>