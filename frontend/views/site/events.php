<?php

$this->title = 'Philippine Poverty-Environment Initiative | News & Events';
?>
<?= Yii::$app->view->renderFile('@app/views/layouts/navbar.php') ?>

<div class="site-events">

	<section id="events" class="container">
		<?= Yii::$app->view->renderFile('@app/views/components/events.php') ?>

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
	</section>
	
</div>

<?= Yii::$app->view->renderFile('@app/views/layouts/footer.php') ?>
