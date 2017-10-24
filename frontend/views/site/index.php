<?php
namespace frontend\views\site;

use Yii;
use yii\helpers\Html;

$this->title = 'Welcome to Philippine Poverty-Environment Initiative | Philippine Poverty-Environment Initiative';
?>
<div class="site-index">

    <section id="banner" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Philippine Poverty-Environment Initiative</h1>
                    <p>PPEI is a five-year (2011-2015) collaborative program of the Government of the Philippines and United Nations Development Programme-United Nations Environment Programme (UNDP-UNEP), through the Department of the Interior and Local Government (DILG).</p>
                    <a href="#" class="btn btn-primary btn-lg">Learn more</a>		
                </div>
                <div class="col-md-5">
                    
                </div>
            </div>
        </div>
    </section><!-- Banner -->
    
    <section id="headline" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Quidem, molestiae sunt illum hic inventore tempore laudantia?</h4>		
                </div>
                <div class="col-md-4">
                    <h6>Philippine Standard Time:</h6>
                    <h6>Thursday, October 12, 2017, 12:09:27 AM</h6>
                </div>
            </div>
        </div>
    </section><!-- Headline -->

    <section id="content" class="container">
        <div class="row">
            <div id="news" class="col-md-8">
            <h1>News & Updates</h1>            
                <ul class="list-group">
                    <li class="list-group-item">
                        <img src="http://lorempixel.com/400/300/cats/" alt="...">
                        <div class="n-content p-3">
                            <h3><a href="#">Lorem ipsum dolor sit.</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum rerum voluptatem expedita voluptatum tenetur earum aperiam quas esse! Harum, ad dolores nobis nesciunt esse alias debitis. Atque iste molestiae hic.</p>
                            <h6 class="text-secondary">
                                By PPEIV2 &#8226; 
                                <i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
                                <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
                                <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
                            </h6>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <img src="http://lorempixel.com/400/300/cats/" alt="...">
                        <div class="n-content p-3">
                            <h3><a href="#">Quas accusamus optio doloribus!</a></h3>
                            <p>Reprehenderit explicabo perferendis a ad quo, reiciendis nisi modi. Exercitationem, saepe odio? Voluptatem possimus omnis, labore illo eligendi saepe dolorum nesciunt, esse hic unde necessitatibus, molestiae sit praesentium magnam nisi.</p>
                            <h6 class="text-secondary">
                                By PPEIV2 &#8226; 
                                <i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
                                <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
                                <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
                            </h6>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <img src="http://lorempixel.com/400/300/cats/" alt="...">
                        <div class="n-content p-3">
                            <h3><a href="#">Eius sapiente sit eligendi?</a></h3>
                            <p>Cumque reprehenderit laudantium repellendus tempora non cum est molestiae doloribus facere dolorum magni amet officia similique esse voluptates consequatur, delectus nemo quisquam. Consequatur modi aliquam odio optio saepe perferendis maiores!</p>
                            <h6 class="text-secondary">
                                By PPEIV2 &#8226; 
                                <i class="fa fa-clock-o" aria-hidden="true"></i> X days ago &#8226;
                                <i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Share"></i>
                                <i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Tweet"></i>
                            </h6>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <div id="calendar">
                    <div id="mini-clndr">
												<script id="mini-clndr-template" type="text/template">
                            <div class="controls">
															<div class="clndr-previous-button">&lsaquo;</div>
															<div class="month-year"><%= month %> | <%= year %></div>
															<div class="clndr-next-button">&rsaquo;</div>
														</div>
														<div class="clndr-content">
															<div class="days-container">
																<div class="headers">
																	<% _.each(daysOfTheWeek, function(day) { %>
																		<div class="day-header"><%= day %></div>
																	<% }); %>
																</div>
																<div class="days-list">
																	<% _.each(days, function(day) { %>
																		<div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div>
																	<% }); %>
																</div>
															</div>
															<div class="events-container">
																<div class="headers">
																	<div class="x-button">x</div>
																	<div class="event-header">EVENTS</div>
																</div>
																<div class="events-list">
																	<% _.each(eventsThisMonth, function(event) { %>
																		<div class="event">
																			<a href="<%= event.url %>"><%= moment(event.date).format('MMMM Do') %>: <%= event.title %></a>
																		</div>
																	<% }); %>
																</div>
															</div>
														</div>
                        </script>
										</div>
                </div>
            </div>
				</div>
    </section><!-- Content -->
    <section id="partners" class="container-fluid">
        <div class="container">
            <h1><i class="fa fa-handshake-o" aria-hidden="true"></i> Our partners</h1>

            <!-- <?= Html::img(Yii::getAlias('@backend').'/web/uploads/images/partners/logo/CBMS.png');?> -->

        </div>
    </section><!-- Partners -->

</div>
