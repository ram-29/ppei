const mModule = (function (global, $) {

  function imageResize({ data: { images, bannerContent } }) {
    Object.keys(images).forEach((i) => {
      if (isNaN(i)) return;
      images[i].style.height = `${bannerContent[0].clientHeight}px`;
    });
  }

  function getTitleAndSummary(li) {
    const p = $(li).parent().prev();
    const h3 = $(p).prev();

    return {
      title: h3.text(),
      summary: p.text(),
    };
  }

  function share({ title, summary }) {
    console.log(`SHARE= ${title} : ${summary}`);
  }

  function tweet({ title, summary }) {
    console.log(`TWEET= ${title} : ${summary}`);
  }

  function loadArticleContents(e) {
    const li = e.target;

    if (li.className.includes('facebook')) {
      share(getTitleAndSummary(li));
    } else if (li.className.includes('twitter')) {
      tweet(getTitleAndSummary(li));
    }
  }

  function toggleFab({ fab, scrollPosition }) {
    if (scrollPosition) {
      fab.addClass('fab-show');
      return;
    }
    fab.removeAttr('class');
  }

  function scrollTop({ data: { page } }) {
    page.animate({
      scrollTop: 0,
    }, 500);
  }

  function scrollBottom({ data: { page } }) {
    page.animate({
      scrollTop: page[1].clientHeight,
    }, 500);
  }

  function initFab({ data: { fab } }) {
    let ticking = false;
    const scrollPosition = global[0].scrollY;

    if (!ticking) {
      global[0].requestAnimationFrame(() => {
        toggleFab({ fab, scrollPosition });
        ticking = false;
      });
      ticking = true;
    }
  }

  function toggleCalendar({ data: { calendar } }) {
    calendar.toggleClass('show-events', false);
  }

  function drawChart({ data: { data, options } }) {
    const chart = new google.visualization.GeoChart(document.getElementById('geo-map'));
    chart.draw(data, options);
  }

  function initMap() {
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

    drawChart({ data: { data, options } });

    global.resize({ data, options }, drawChart);
  }

  function showAlbum(e) {
    if (e.target.className === 'nGY2GThumbnailCustomLayer') {
      const mLayer = e.target;
      const h2 = $('#mAlbum');
      const albumName = $(mLayer).next().children().text();

      if (albumName.indexOf('image') !== -1) return;

      h2.html(albumName);
      h2.toggleClass('mDisplay');
    }
  }

  function init() {
    // Banner Image
    if ($('#banner').length) {
      const $bannerSlider = $('#banner-slider');
      const bannerContent = $('#banner-content');
      const images = $bannerSlider.children().children().children().children();

      imageResize({ data: { images, bannerContent } });
      global.resize({ images, bannerContent }, imageResize);
    }

    // Tooltip
    if ($('[data-toggle="tooltip"]').length) {
      const $toolTip = $('[data-toggle="tooltip"]');

      $toolTip.tooltip();
    }

    // Social Media
    if ($('.list-group').length) {
      const $listGroup = $('.list-group');

      $listGroup.click(loadArticleContents);
    }

    // FAB
    if ($('#components-fab').length) {

      const page = $('html, body');
      const fab = $('#components-fab');
      const up = $(fab).children().first();
      const down = $(up).next().next();

      up.click({ page }, scrollTop);
      down.click({ page }, scrollBottom);
      global.scroll({ fab }, initFab);
    }

    // CLNDRjs
    if ($('#mini-clndr').length) {
      // Hack : Deprecation Issue
      moment.createFromInputFallback = function (config) { config._d = new Date(config._i); };

      const $miniClndr = $('#mini-clndr');
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

      $miniClndr.clndr({
        template: $('#mini-clndr-template').html(),
        daysOfTheWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        events,
        clickEvents: {
          click(target) {
            if (target.events.length) $miniClndr.toggleClass('show-events', true);
            $miniClndr.find('.x-button').click({ calendar: $miniClndr }, toggleCalendar);
          },
          onMonthChange() {
            $miniClndr.toggleClass('show-events', false);
            $miniClndr.find('.x-button').click({ calendar: $miniClndr }, toggleCalendar);
          },
        },
        adjacentDaysChangeMonth: true,
        forceSixRows: false,
      });
    }

    // GeoChart : https://www.gstatic.com/charts/loader.js
    if (($('#geo-map').length)) {
      google.charts.load('current', {
        callback: initMap,
        packages: ['geochart'],
        mapsApiKey: 'AIzaSyCnO5ud0AQXw38v6CWmNujOeksxvjqUdfk',
      });
    }
  }

  // NanoGallery
  if ($('#nano-gallery').length) {
    $('#nano-gallery').nanogallery2({
      displayBreadcrumb: false,
      thumbnailDisplayTransition: 'slideLeft',
      thumbnailDisplayTransitionDuration: 500,
      thumbnailDisplayInterval: 250,
    });

    $('.nGY2Gallery').one('click', showAlbum);
  }

  return {
    init,
  };

}($(window), window.jQuery));

$(document).ready(mModule.init);
