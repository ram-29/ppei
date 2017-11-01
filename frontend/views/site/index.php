<?php
namespace frontend\views\site;

use Yii;
use yii\helpers\Html;

$this->title = 'Welcome to Philippine Poverty-Environment Initiative | Philippine Poverty-Environment Initiative';
?>
<?= Yii::$app->view->renderFile('@app/views/layouts/navbar.php') ?>

<div class="site-index">

	<section id="banner">
		<div id="banner-slider" class="carousel slide container-fluid" data-ride="carousel">
			<div class="row">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<?= Html::img('@web/images/banner/image-1.jpg', [
							'class' => 'd-block w-100',
							'alt' => 'Banner Image'
						]); ?>
					</div>
					<div class="carousel-item">
						<?= Html::img('@mFrontEnd/images/banner/image-2.jpg', [
							'class' => 'd-block w-100',
							'alt' => 'Banner Image'
						]); ?>
					</div>
					<div class="carousel-item">
						<?= Html::img('@mFrontEnd/images/banner/image-3.jpg', [
							'class' => 'd-block w-100',
							'alt' => 'Banner Image'
						]); ?>
					</div>
				</div>
			</div>
		</div>
		<div id="banner-content" class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<h1 class="display-3">Philippine Poverty-Environment Initiative</h1>
						<p class="lead">PPEI is a five-year (2011-2015) collaborative program of the Government of the Philippines and United Nations Development Programme-United Nations Environment Programme (UNDP-UNEP), through the Department of the Interior and Local Government (DILG).</p>
						<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
					</div>
					<div class="col-md-5">
						<?= Html::img('@web/images/logo/dilg-logo.png', [
							'alt' => 'DILG Logo'
						]); ?>
						<?= Html::img('@web/images/logo/undp-logo.png', [
							'alt' => 'UNDP Logo'
						]); ?>
						<br>
						<?= Html::img('@web/images/logo/unep-logo.png', [
							'alt' => 'UNEP Logo'
						]); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="headline" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2>Odit maxime quibusdam consectetur, velit.</h2>
				</div>
				<div class="col-md-4">
					<h6>Philippine Standard Time:</h6>
					<h6 class="time">Thursday, October 12, 2017, 12:09:27 AM</h6>
				</div>
			</div>
		</div>
	</section>

	<section id="content" class="container">
		<?= Yii::$app->view->renderFile('@app/views/components/events.php') ?>
		<h4 class="events-link">Looking for more? Check out our <a href="#">News & Events</a> section.</h4>
	</section>

	<section id="map" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div id="geo-map"></div>
				</div>
				<div id="map-desc" class="col-md-6">
					<h1>Philippine Poverty-Environment Initiative</h1>
					<p>Operates at national and local levels, providing a better enabling environment for national and local governments to improve governance of natural wealth and benefit sharing from the revenues derived from them for a sustained and broad-based growth and ecological stability.</p>
					<p>At the local level, PPEI is currently working with the following local government units for piloting, capacity development, analytical studies, etc. Since 2011, the focus has been on mining and energy. PPEI aims to cover other natural resources (i.e. forestry, marine and coastal, water, etc.) beginning 2013.</p>
				</div>
			</div>
		</div>
	</section>

	<section id="partners" class="container-fluid">
		<div class="container">
			<h1><i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i> Our Partners</h1>
			<div class="row">
				<div class="col-md">
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/CBMS.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Community-Based Monitoring System</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/COMP.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Chambers of Mines of the Philippines</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/DBM.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Department of Budget and Management</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/DENR.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Department of Environment and Natural Resources</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/DOE.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Department of Energy</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/DOF.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Department of Finance</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/LCP.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>League of Cities of the Philippines</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/LMP.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>League of Municipalities of the Philippines</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/LPP.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>League of Provinces of the Philippines</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/MGB.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Mines and Geosciences Bureau</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/NAPC.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>National Anti-Poverty Commission</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/NCIP.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>National Commission on Indigeneous Peoples</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/NEDA.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>National Economic and Development Authority</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/PBSP.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Philippine Business for Social Pogress</h6>
					</div>
					<div class="partner">
						<a href="#">
							<?= Html::img('@mBackEnd/uploads/images/partners/logo/ULAP.jpg', [
								'class' => 'img-thumbnail hvr-float'
							]); ?>
						</a>
						<h6>Union of Local Authorities of the Philippines</h6>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<?= Yii::$app->view->renderFile('@app/views/layouts/footer.php') ?>