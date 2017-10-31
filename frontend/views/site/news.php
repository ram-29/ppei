<?php

$this->title = 'Philippine Poverty-Environment Initiative | News & Events';
?>
<?= Yii::$app->view->renderFile('@app/views/layouts/navbar.php'); ?>

<div class="site-news">
	
	<section id="news" class="container">
		<div class="row">
			<div class="col-md">
				<div class="card">
					<img class="card-img" src="http://lorempixel.com/400/250/cats/" alt="...">
					<div class="card-img-overlay">
						<div class="card-content">
							<div class="category">Event</div>
							<h1 class="card-title">Lorem ipsum dolor sit amet.</h1>
							<h6>
								By PPEIV2 &#8226; 
								<i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
								<i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
								<i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
							</h6>
						</div>
					</div>
				</div>

				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim similique soluta repudiandae beatae. Recusandae error maxime, fugit magnam repudiandae velit, explicabo deserunt nisi doloribus odit unde! Nostrum minima eos voluptatibus!</p>
			</div>
		</div>
	</section>

	

</div>

<?= Yii::$app->view->renderFile('@app/views/layouts/footer.php'); ?>
