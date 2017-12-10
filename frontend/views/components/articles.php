<?php

use yii\helpers\Html;
?>
<div id="components-events">
	<h1 class="news-header">
		<i class="fa fa-newspaper-o" aria-hidden="true"></i>
		<?= $featureName ?>
	</h1>
	<div id="news-head" class="row">
		<div class="col-md-7">
			<div class="card hvr-float">
				<img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
				<div class="card-img-overlay">
					<div class="card-content">
						<h4 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, odit?</h4>
						<h6 class="card-details lead">
							By PPEIV2 &#8226; 
							<i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
							<i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
							<i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
						</h6>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card hvr-float">
				<img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
				<div class="card-img-overlay">
					<div class="card-content">
						<h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
						<h6 class="card-details">
							By PPEIV2 &#8226; 
							<i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
							<i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
							<i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
						</h6>
					</div>
				</div>
			</div>
			<div class="card hvr-float">
				<img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
				<div class="card-img-overlay">
					<div class="card-content">
						<h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
						<h6 class="card-details">
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

	<div id="news-subhead" class="row">
		<div class="col-md-4">
			<div class="card hvr-float">
				<img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
				<div class="card-img-overlay">
					<div class="card-content">
						<h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
						<h6 class="card-details">
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
			<div class="card hvr-float">
				<img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
				<div class="card-img-overlay">
					<div class="card-content">
						<h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
						<h6 class="card-details">
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
			<div class="card hvr-float">
				<img class="card-img" src="http://lorempixel.com/400/350/cats/" alt="Card image">
				<div class="card-img-overlay">
					<div class="card-content">
						<h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
						<h6 class="card-details">
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

	<div id="news-list" class="row">
		<div class="col-md-8">
			<ul class="list-group">

				<?php $i = 0; ?>
				<?php foreach($contents as $content) :?>
						<li class="list-group-item">
							<div class="item-content hvr-forward">
								<img src="https://dummyimage.com/400x300/558B2F/fff" alt="...">
								<div class="item-overview">
									<h4 class="item-title"><?= $content['title'] ?></h4>
									<p class="item-summary"><?= $content['content'] ?></p>
									<h6 class="item-details">
										By PPEIV2 &#8226; 
										<i class="fa fa-clock-o" aria-hidden="true"></i>
											<span id="list-time-<?= $i ?>"></span> &#8226;
											<?= $this->registerJs('var time = $("#list-time-'.$i.'"); time.text("Published "+moment("'.$content['date_posted'].'").fromNow());'); ?>
										<i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
										<i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
									</h6>
								</div>
							</div>
						</li>
					<?php $i++; ?>
				<?php endforeach ?>
				
			</ul>
		</div>
		<div class="col-md-4">
			<?= Yii::$app->view->renderFile('@app/views/components/calendar.php') ?>
		</div>
	</div>
</div>