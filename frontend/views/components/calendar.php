<?php

?>
<div id="components-calendar">
	<h1 class="cal-header">
		<i class="fa fa-calendar" aria-hidden="true"></i>
		Calendar of Activities
	</h1>
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
							<div class="<%= day.classes %>" data-toggle="tooltip" data-placement="bottom" title="<% _.each(day.events, function(event){ %><%= event.title %><% }) %>">
								<%= day.day %>
							</div>
						<% }); %>
					</div>
				</div>
				<div class="events-container">
					<div class="headers">
						<div class="x-button">x</div>
						<div class="event-header">Activity Details</div>
					</div>
					<div class="events-list">
						<div id="event" class="event">
							<h5 id="event-title"></h5>
							<p id="event-details"></p>
						</div>
					</div>
				</div>
			</div>
		</script>
	</div>
</div>
