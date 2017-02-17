    $(function(){
        if(window.location.hash) {
            var hash = window.location.hash;
            if(hash=='#loginModal') {
                $(hash).modal('toggle');
            }
        }
    });

    var is_book_rated = false;
    if(is_book_rated == false) {
        $(".rate").hover(function(){
            if(is_book_rated == false) {
            if($(this).attr('id')==("star-1") && $(this).hasClass("rate"))
            {
                $(this).removeClass("glyphicon-star-empty");
                $(this).addClass("glyphicon-star");
            }
            }
            if(is_book_rated == false) {
            if($(this).attr('id')==("star-2") && $(this).hasClass("rate"))
            {
                $(this).removeClass("glyphicon-star-empty");
                $(this).addClass("glyphicon-star");

                $("#star-1").removeClass("glyphicon-star-empty");
                $("#star-1").addClass("glyphicon-star");
            }
            }
            if(is_book_rated == false) {
            if($(this).attr('id')==("star-3") && $(this).hasClass("rate"))
            {
                $(this).removeClass("glyphicon-star-empty");
                $(this).addClass("glyphicon-star");

                $("#star-1").removeClass("glyphicon-star-empty");
                $("#star-1").addClass("glyphicon-star");
                $("#star-2").removeClass("glyphicon-star-empty");
                $("#star-2").addClass("glyphicon-star");
            }
            }
            if(is_book_rated == false) {
            if($(this).attr('id')==("star-4") && $(this).hasClass("rate"))
            {
                $(this).removeClass("glyphicon-star-empty");
                $(this).addClass("glyphicon-star");

                $("#star-1").removeClass("glyphicon-star-empty");
                $("#star-1").addClass("glyphicon-star");
                $("#star-2").removeClass("glyphicon-star-empty");
                $("#star-2").addClass("glyphicon-star");
                $("#star-3").removeClass("glyphicon-star-empty");
                $("#star-3").addClass("glyphicon-star");
            }
            }
            if(is_book_rated == false) {
            if($(this).attr('id')==("star-5") && $(this).hasClass("rate"))
            {
                $(this).removeClass("glyphicon-star-empty");
                $(this).addClass("glyphicon-star");

                $("#star-1").removeClass("glyphicon-star-empty");
                $("#star-1").addClass("glyphicon-star");
                $("#star-2").removeClass("glyphicon-star-empty");
                $("#star-2").addClass("glyphicon-star");
                $("#star-3").removeClass("glyphicon-star-empty");
                $("#star-3").addClass("glyphicon-star");
                $("#star-4").removeClass("glyphicon-star-empty");
                $("#star-4").addClass("glyphicon-star");
            }
            }
        }, function(){
            if(is_book_rated == false) {
                $(this).removeClass("glyphicon-star");
                $(this).addClass("glyphicon-star-empty");
            }
            if(is_book_rated == false) {
            if($("#star-1").hasClass("glyphicon-star"))
            {
                $("#star-1").removeClass("glyphicon-star");
                $("#star-1").addClass("glyphicon-star-empty");
            }
            }
            if(is_book_rated == false) {
            if($("#star-2").hasClass("glyphicon-star"))
            {
                $("#star-2").removeClass("glyphicon-star");
                $("#star-2").addClass("glyphicon-star-empty");
            }
            }
            if(is_book_rated == false) {
            if($("#star-3").hasClass("glyphicon-star"))
            {
                $("#star-3").removeClass("glyphicon-star");
                $("#star-3").addClass("glyphicon-star-empty");
            }
            }
            if(is_book_rated == false) {
            if($("#star-4").hasClass("glyphicon-star"))
            {
                $("#star-4").removeClass("glyphicon-star");
                $("#star-4").addClass("glyphicon-star-empty");
            }
            }
        });
    }