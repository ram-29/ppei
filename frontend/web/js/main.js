(function ($) {
    var currentMonth = moment().format('YYYY-MM');
    var nextMonth = moment().add('month', 1).format('YYYY-MM');

    var events = [
        { date: currentMonth + '-' + '10', title: 'Persian Kitten Auction', location: 'Center for Beautiful Cats' },
        { date: currentMonth + '-' + '19', title: 'Cat Frisbee', location: 'Jefferson Park' },
        { date: currentMonth + '-' + '23', title: 'Kitten Demonstration', location: 'Center for Beautiful Cats' },
        { date: nextMonth + '-' + '07', title: 'Small Cat Photo Session', location: 'Center for Cat Photography' }
    ];

    $('#mini-clndr').clndr({
        template: $('#mini-clndr-template').html(),
        events: events,
        clickEvents: {
            click: function (target) {
                if (target.events.length) {
                    var daysContainer = $('#mini-clndr').find('.days-container');
                    daysContainer.toggleClass('show-events', true);
                    $('#mini-clndr').find('.x-button').click(function () {
                        daysContainer.toggleClass('show-events', false);
                    });
                }
            }
        },
        adjacentDaysChangeMonth: true,
        forceSixRows: true
    });

    $('.fa').tooltip()

    $('.list-group').on('click', function (e) {
        
        const li = e.target;
        let title, summary;
       
        if (li.className.includes('facebook')) {
            getNewsTitleAndContent()
            share(title, summary)
        } else if (li.className.includes('twitter')){
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
})(window.jQuery)

