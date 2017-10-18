(function ($) {
    $('#mCalendar').clndr()
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

