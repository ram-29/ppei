 (function ($) {
	$(document).ready(function () {

		// Image Resize
		if ($('#banner').length) {
			var bannerSlider = $('#banner-slider')
			var bannerContent = $('#banner-content')
			var images = bannerSlider.children().children().children().children()
			images.map(i => images[i].style.height = bannerContent[0].clientHeight + 'px')

			$(window).resize(function () {
				images.map(i => images[i].style.height = bannerContent[0].clientHeight + 'px')
			})
		}

		// Tooltip
		if ($('[data-toggle="tooltip"]').length) {
			$('[data-toggle="tooltip"]').tooltip()
		}

		// FB Share & Tweet
		if ($('.list-group').length) {
			$(".list-group").on("click", function (e) {
				const li = e.target
				let title, summary

				if (li.className.includes("facebook")) {
					getNewsTitleAndContent()
					share(title, summary)
				} else if (li.className.includes("twitter")) {
					getNewsTitleAndContent()
					tweet(title, summary)
				}

				function getNewsTitleAndContent() {
					const p = $(li).parent().prev()
					const h3 = $(p).prev()

					title = h3.text()
					summary = p.text()
				}

				function share(title, summary) {
					console.log(`SHARE\nTitle: ${title}\nContent: ${summary}`)
				}

				function tweet(title, summary) {
					console.log(`TWEET\nTitle: ${title}\nContent: ${summary}`)
				}
			})	
		}

		// Fab Scroll Listener
		if ($('#components-fab').length) {
			var scrollPos = 0
			var ticking = false
			var fab = $('#components-fab')

			function toggleFab(scroll_pos) {
				if (scroll_pos) {
					fab.addClass('fab-show')
					return
				}
				fab.removeClass('fab-show')
			}

			window.addEventListener('scroll', function () {
				scrollPos = window.scrollY
				if (!ticking) {
					window.requestAnimationFrame(function () {
						toggleFab(scrollPos)
						ticking = false
					})
					ticking = true
				}
			})

			var page = $('html, body')
			var up = $(fab).children().first()
			var down = $(up).next().next()

			up.click(function () {
				page.animate({
					scrollTop: 0
				}, 500)
			})

			down.click(function () {
				page.animate({
					scrollTop: page[1].clientHeight
				}, 500)
			})
		}

		// CLNDRjs
		if ($('#mini-clndr').length) {
			// MomentJS Hack : Deprecation Issue
			moment.createFromInputFallback = function (config) { config._d = new Date(config._i) }

			var currentMonth = moment().format("YYYY-MM")
			var nextMonth = moment().add(1, "month").format("YYYY-MM")

			var events = [
				{
					date: currentMonth + "-" + "1",
					title: "Cat Frisbee",
					location: "Jefferson Park"
				},
				{
					date: currentMonth + "-" + "6",
					title: "Lorem ipsum!",
					location: "Center for Beautiful Cats"
				},
				{
					date: currentMonth + "-" + "10",
					title: "Persian Kitten Auction",
					location: "Center for Beautiful Cats"
				},
				{
					date: currentMonth + "-" + "19",
					title: "Dolor sit amet.",
					location: "Center for Beautiful Cats"
				},
				{
					date: currentMonth + "-" + "24",
					title: "Her birthday!",
					location: "Center for Beautiful Cats"
				},
				{
					date: currentMonth + "-" + "29",
					title: "My day!",
					location: "Center for Beautiful Cats"
				},
				{
					date: nextMonth + "-" + "07",
					title: "Small Cat Photo Session",
					location: "Center for Cat Photography"
				}
			]

			var miniClndr = $("#mini-clndr")
			miniClndr.clndr({
				template: $("#mini-clndr-template").html(),
				daysOfTheWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
				events: events,
				clickEvents: {
					click: function (target) {
						if (target.events.length) miniClndr.toggleClass("show-events", true)
						miniClndr.find(".x-button").click(function () {
							miniClndr.toggleClass("show-events", false)
						})
					},
					onMonthChange: function () {
						miniClndr.toggleClass("show-events", false)
						miniClndr.find(".x-button").click(function () {
							miniClndr.toggleClass("show-events", false)
						})
					}
				},
				adjacentDaysChangeMonth: true,
				forceSixRows: false
			})
		}

		// Google GeoChart Visualization
		if ($('#geo-map').length) {
			google.charts.load('current', {
				'packages': ['geochart'],
				'mapsApiKey': 'AIzaSyCnO5ud0AQXw38v6CWmNujOeksxvjqUdfk'
			})
			google.charts.setOnLoadCallback(drawRegionsMap)

			function drawRegionsMap() {
				var data = google.visualization.arrayToDataTable([
					['Provinces', 'Region'],
					[{ v: 'PH-01', f: 'Metallic Mining' }, 1],
					[{ v: 'PH-03', f: 'Non-Metallic Mining' }, 3],
					[{ v: 'PH-41', f: 'Oil & Gas' }, 4],
					[{ v: 'PH-05', f: 'Metallic Mining' }, 5],
					[{ v: 'PH-06', f: 'Renewable Energy Source' }, 6],
					[{ v: 'PH-07', f: 'Metallic Mining' }, 7],
					[{ v: 'PH-13', f: 'Metallic Mining' }, 13]
				])

				var options = {
					region: 'PH',
					resolution: 'provinces',
					backgroundColor: '#fff',
					datalessRegionColor: '#9CCC65',
					colorAxis: {
						colors: ['#FFFF03', '#FF0000', '#000099', '#FFFF03', '#009900', '#FFFF03', '#FFFF03'],
						values: [1, 3, 4, 5, 6, 7, 13]
					},
					legend: 'none'
				}

				var chart = new google.visualization.GeoChart(document.getElementById('geo-map'))

				chart.draw(data, options)
			}
		}

		//NanoGallery
		if ($('#nano-gallery').length) {
			$('#nano-gallery').nanogallery2({
				displayBreadcrumb: false,
				thumbnailDisplayTransition: 'slideLeft',
				thumbnailDisplayTransitionDuration: 500,
				thumbnailDisplayInterval: 250
			})
			
			$('.nGY2Gallery').one('click', function (e) {
				if (e.target.className === 'nGY2GThumbnailCustomLayer') {
					var mLayer = e.target
					var h2 = $('#mAlbum')
					var albumName = $(mLayer).next().children().text()

					if (albumName.indexOf('image') !== -1) return

					h2.html(albumName)
					h2.toggleClass('mDisplay')
				}
			})
		}
	})
})(window.jQuery)
