(function ($) {
    $('.fa').tooltip()

    $('.list-group').on('click', function (e) {
        let isFB = true;
        if (e.target.className.includes('facebook')) {
            determineSocialMedia(isFB, e.target)
        } else if (e.target.className.includes('twitter')){
            determineSocialMedia(!isFB, e.target)
        }
    })

    function determineSocialMedia(socialMedia, target) {
        const p = $(target).parent().prev()
        const h3 = $(p).prev()

        if (socialMedia) {
            share(h3.text(), p.text())
            return
        }
        tweet(h3.text(), p.text())
    }

    function share(title, content) {
        console.log(`SHARE==Title: ${title}\nContent: ${content}`)
    }

    function tweet(title, content) {
        console.log(`TWEET==Title: ${title}: Content: ${content}`)
    }
})(jQuery)

