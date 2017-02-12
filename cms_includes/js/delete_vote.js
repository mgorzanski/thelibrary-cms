function delete_vote(book_id)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                if(this.responseText == "voteDeleted") {
                    var first_star = $('#rate-book').children('span').first();
                    var second_star = first_star.next();
                    var third_star = second_star.next();
                    var fourth_star = third_star.next();
                    var fifth_star = fourth_star.next();

                    first_star.attr('onClick', 'rate(1, ' + book_id + ', 1)');
                    first_star.attr('id', 'star-1');
                    first_star.removeClass('rated');
                    first_star.addClass('rate');
                    first_star.removeClass('glyphicon-star');
                    first_star.addClass('glyphicon-star-empty');

                    second_star.attr('onClick', 'rate(2, ' + book_id + ', 2)');
                    second_star.attr('id', 'star-2');
                    second_star.removeClass('rated');
                    second_star.addClass('rate');
                    second_star.removeClass('glyphicon-star');
                    second_star.addClass('glyphicon-star-empty');

                    third_star.attr('onClick', 'rate(3, ' + book_id + ', 3)');
                    third_star.attr('id', 'star-3');
                    third_star.removeClass('rated');
                    third_star.addClass('rate');
                    third_star.removeClass('glyphicon-star');
                    third_star.addClass('glyphicon-star-empty');

                    fourth_star.attr('onClick', 'rate(4, ' + book_id + ', 4)');
                    fourth_star.attr('id', 'star-4');
                    fourth_star.removeClass('rated');
                    fourth_star.addClass('rate');
                    fourth_star.removeClass('glyphicon-star');
                    fourth_star.addClass('glyphicon-star-empty');

                    fifth_star.attr('onClick', 'rate(5, ' + book_id + ', 5)');
                    fifth_star.attr('id', 'star-5');
                    fifth_star.removeClass('rated');
                    fifth_star.addClass('rate');
                    fifth_star.removeClass('glyphicon-star');
                    fifth_star.addClass('glyphicon-star-empty');

                    is_book_rated = false;
                    can_be_added = true;
                }
            }
        }

        xmlhttp.open("GET", "delete_vote.php?book_id=" + book_id, true);
        xmlhttp.send();
    }