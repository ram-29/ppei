(function ($) {
  // Banner Image Responsiveness
  if ($('#banner').length) {
    const bannerSlider = $('#banner-slider');
    const bannerContent = $('#banner-content');
    const images = bannerSlider.children().children().children().children();

    const imageResize = function () {
			Object.keys(images).forEach((i) => {
				if (isNaN(i)) return;
        images[i].style.height = `${bannerContent[0].clientHeight}px`;
      });
    };

    imageResize();
    $(window).resize(() => imageResize());
  }

  // Tooltip
  if ($('[data-toggle="tooltip"]').length) {
    $('[data-toggle="tooltip"]').tooltip();
  }

  // FB Share & Tweet
  if ($('.list-group').length) {
    $('.list-group').on('click', (e) => {
      const li = e.target;
      let title,
        summary;

      const getNewsTitleAndContent = function () {
        const p = $(li).parent().prev();
        const h3 = $(p).prev();

        title = h3.text();
        summary = p.text();
      };

      const share = function (mTitle, mSummary) {
        console.log(`SHARE\nTitle: ${mTitle}\nContent: ${mSummary}`);
      };

      const tweet = function (mTitle, mSummary) {
        console.log(`TWEET\nTitle: ${mTitle}\nContent: ${mSummary}`);
      };

      if (li.className.includes('facebook')) {
        getNewsTitleAndContent();
        share(title, summary);
      } else if (li.className.includes('twitter')) {
        getNewsTitleAndContent();
        tweet(title, summary);
      }
    });
  }

  // Fab Scroll Listener
  if ($('#components-fab').length) {
    let scrollPos = 0;
    let ticking = false;
    const fab = $('#components-fab');

    const toggleFab = function (mScrollPos) {
      if (mScrollPos) {
        fab.addClass('fab-show');
        return;
      }
      fab.removeClass('fab-show');
    };

    window.addEventListener('scroll', () => {
      scrollPos = window.scrollY;
      if (!ticking) {
        window.requestAnimationFrame(() => {
          toggleFab(scrollPos);
          ticking = false;
        });
        ticking = true;
      }
    });

    const page = $('html, body');
    const up = $(fab).children().first();
    const down = $(up).next().next();

    up.click(() => {
      page.animate({
        scrollTop: 0,
      }, 500);
    });

    down.click(() => {
      page.animate({
        scrollTop: page[1].clientHeight,
      }, 500);
    });
  }

  // CLNDRjs
  if ($('#mini-clndr').length) {
    // MomentJS Hack : Deprecation Issue
    moment.createFromInputFallback = function (config) { config._d = new Date(config._i); };

    const currentMonth = moment().format('YYYY-MM');
    const nextMonth = moment().add(1, 'month').format('YYYY-MM');

    const events = [
      {
        date: `${currentMonth}-1`,
        title: 'Cat Frisbee',
        location: 'Jefferson Park',
      },
      {
        date: `${currentMonth}-6`,
        title: 'Lorem ipsum!',
        location: 'Center for Beautiful Cats',
      },
      {
        date: `${currentMonth}-10`,
        title: 'Persian Kitten Auction',
        location: 'Center for Beautiful Cats',
      },
      {
        date: `${currentMonth}-19`,
        title: 'Dolor sit amet.',
        location: 'Center for Beautiful Cats',
      },
      {
        date: `${currentMonth}-24`,
        title: 'Her birthday!',
        location: 'Center for Beautiful Cats',
      },
      {
        date: `${currentMonth}-29`,
        title: 'My day!',
        location: 'Center for Beautiful Cats',
      },
      {
        date: `${nextMonth}-07`,
        title: 'Small Cat Photo Session',
        location: 'Center for Cat Photography',
      },
    ];

    const miniClndr = $('#mini-clndr');
    miniClndr.clndr({
      template: $('#mini-clndr-template').html(),
      daysOfTheWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      events,
      clickEvents: {
        click(target) {
          if (target.events.length) miniClndr.toggleClass('show-events', true);
          miniClndr.find('.x-button').click(() => {
            miniClndr.toggleClass('show-events', false);
          });
        },
        onMonthChange() {
          miniClndr.toggleClass('show-events', false);
          miniClndr.find('.x-button').click(() => {
            miniClndr.toggleClass('show-events', false);
          });
        },
      },
      adjacentDaysChangeMonth: true,
      forceSixRows: false,
    });
  }

  // Google GeoChart Visualization : https://www.gstatic.com/charts/loader.js
  if ($('#geo-map').length) {
    const drawRegionsMap = function () {
      const data = google.visualization.arrayToDataTable([
        ['Provinces', 'Region'],
        [{ v: 'PH-01', f: 'Metallic Mining' }, 1],
        [{ v: 'PH-03', f: 'Non-Metallic Mining' }, 3],
        [{ v: 'PH-41', f: 'Oil & Gas' }, 4],
        [{ v: 'PH-05', f: 'Metallic Mining' }, 5],
        [{ v: 'PH-06', f: 'Renewable Energy Source' }, 6],
        [{ v: 'PH-07', f: 'Metallic Mining' }, 7],
        [{ v: 'PH-13', f: 'Metallic Mining' }, 13],
      ]);

      const options = {
        region: 'PH',
        resolution: 'provinces',
        backgroundColor: '#fff',
        datalessRegionColor: '#9CCC65',
        colorAxis: {
          colors: ['#FFFF03', '#FF0000', '#000099', '#FFFF03', '#009900', '#FFFF03', '#FFFF03'],
          values: [1, 3, 4, 5, 6, 7, 13],
        },
        legend: 'none',
      };

      const chart = new google.visualization.GeoChart(document.getElementById('geo-map'));
      chart.draw(data, options);

      // Chart Responsiveness
      $(window).resize(() => chart.draw(data, options));
    };

    google.charts.load('current', {
      callback: drawRegionsMap,
      packages: ['geochart'],
      mapsApiKey: 'AIzaSyCnO5ud0AQXw38v6CWmNujOeksxvjqUdfk',
    });
  }

  // NanoGallery
  if ($('#nano-gallery').length) {
    $('#nano-gallery').nanogallery2({
      displayBreadcrumb: false,
      thumbnailDisplayTransition: 'slideLeft',
      thumbnailDisplayTransitionDuration: 500,
      thumbnailDisplayInterval: 250,
    });

    $('.nGY2Gallery').one('click', (e) => {
      if (e.target.className === 'nGY2GThumbnailCustomLayer') {
        const mLayer = e.target;
        const h2 = $('#mAlbum');
        const albumName = $(mLayer).next().children().text();

        if (albumName.indexOf('image') !== -1) return;

        h2.html(albumName);
        h2.toggleClass('mDisplay');
      }
    });
  }
}(window.jQuery));
