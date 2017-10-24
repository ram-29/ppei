;(function($) {
  var currentMonth = moment().format("YYYY-MM");
  var nextMonth = moment().add(1, "month").format("YYYY-MM");

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
  ];

  var miniClndr = $("#mini-clndr");
  miniClndr.clndr({
    template: $("#mini-clndr-template").html(),
    daysOfTheWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
    events: events,
    clickEvents: {
      click: function(target) {
        if (target.events.length) miniClndr.toggleClass("show-events", true);
        miniClndr.find(".x-button").click(function() {
          miniClndr.toggleClass("show-events", false);
        });
      },
      onMonthChange: function() {
        miniClndr.find(".x-button").click(function() {
          miniClndr.toggleClass("show-events", false);
        });
      }
    },
    adjacentDaysChangeMonth: true,
    forceSixRows: false
  });

  $(".fa").tooltip();
  $(".list-group").on("click", function(e) {
    const li = e.target;
    let title, summary;

    if (li.className.includes("facebook")) {
      getNewsTitleAndContent();
      share(title, summary);
    } else if (li.className.includes("twitter")) {
      getNewsTitleAndContent();
      tweet(title, summary);
    }

    function getNewsTitleAndContent() {
      const p = $(li).parent().prev();
      const h3 = $(p).prev();

      title = h3.text();
      summary = p.text();
    }

    function share(title, summary) {
      console.log(`SHARE\nTitle: ${title}\nContent: ${summary}`);
    }

    function tweet(title, summary) {
      console.log(`TWEET\nTitle: ${title}\nContent: ${summary}`);
    }
  });
})(window.jQuery);
