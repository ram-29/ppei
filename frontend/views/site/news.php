<?php

$this->title = 'Philippine Poverty-Environment Initiative | News & Events';
?>
<?= Yii::$app->view->renderFile('@app/views/layouts/navbar.php'); ?>

<div class="site-news">

	<section id="news-container" class="container">
		
		<?= Yii::$app->view->renderFile('@app/views/components/news-headline.php'); ?>

		<div id="news-subhead" class="row">
			<div class="col-md-4">
				<div class="card text-white hvr-float">
					<img class="card-img" src="http://lorempixel.com/200/200/cats/" alt="Card image">
					<div class="card-img-overlay">
						<div class="card-content">
							<h5 class="card-title">Laudantium mollitia tempore omnis dolor?</h5>
							<h6 class="text-white">
								By PPEIV2 &#8226; 
								<i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
								<i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
								<i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
							</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-white hvr-float">
					<img class="card-img" src="http://lorempixel.com/200/200/cats/" alt="Card image">
					<div class="card-img-overlay">
						<div class="card-content">
							<h5 class="card-title">Laudantium mollitia tempore omnis dolor?</h5>
							<h6 class="text-white">
								By PPEIV2 &#8226; 
								<i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
								<i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
								<i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
							</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-white hvr-float">
					<img class="card-img" src="http://lorempixel.com/200/200/cats/" alt="Card image">
					<div class="card-img-overlay">
						<div class="card-content">
							<h5 class="card-title">Laudantium mollitia tempore omnis dolor?</h5>
							<h6 class="text-white">
								By PPEIV2 &#8226; 
								<i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
								<i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
								<i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<?= Yii::$app->view->renderFile('@app/views/components/news-list.php'); ?>
				<ul class="pagination">
					<li class="page-item disabled">
						<a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<?= Yii::$app->view->renderFile('@app/views/components/calendar.php'); ?>
			</div>
		</div>
	</section>

</div>

<?= Yii::$app->view->renderFile('@app/views/layouts/footer.php'); ?>
