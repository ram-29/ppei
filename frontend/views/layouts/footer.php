<?php

use yii\helpers\Html;
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<h5>Group 1</h5>
				<ul class="list-group">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</div>
			<div class="col-md-2">
				<h5>Group 2</h5>
				<ul class="list-group">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</div>
			<div class="col-md-2">
				<h5>Group 3</h5>
				<ul class="list-group">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</div>
			<div class="col-md-6">
				<h4>PPEI Project Management Office</h4>
				<h5>Bureau of Local Government Development</h5>
				<h6>Department of the Interior and Local Government</h6>
				<h6>25th Floor, DILG-NAPOLCOM Center, EDSA cor. <br> Quezon Avenue, Quezon City, PH</h6>
				<h6>Telefax: +632 929 92 35; +632 927 78 52</h6>
				<h6>Email Address: <a href="mailto:ppei_dilg@yahoo.com">ppei_dilg@yahoo.com</a></h6>
			</div>
			<div class="col-md">
				<?= Html::img('@mFrontEnd/images/logo/ppei-logo.png', [
					'width' => '110',
					'height' => '70',
					'alt' => 'PPEI Logo'
				]); ?>
				<h4>Philippine Poverty-Environment Initiative &copy; 2013 - <?= date('Y') ?></h4>
				<ul id="list-lower" class="list-group">
					<li><a href="#">Site Map</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Terms and Conditions</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
