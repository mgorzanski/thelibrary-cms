    var can_be_added = true;
    function rate(value, book_id, element_id) {
        if(can_be_added == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                if(this.responseText == "openLoginModal") {
                    $('#loginModal').modal('toggle');
                }
            }
        }
        }

        $("#star-" + element_id).removeClass("rate");
        $("#star-" + element_id).addClass("rated");

        is_book_rated = true;

        xmlhttp.open("GET", "rate_book.php?value=" + value + "&book_id=" + book_id, true);
        xmlhttp.send();

        can_be_added = false;

        $(".my-rate").text("Moja ocena");
        $(".btn-rate").removeClass("btn-success");
        $(".btn-rate").addClass('btn-danger');
        $(".btn-rate").text("Usuń ocenę");
        $(".btn-rate").attr("name", "delete_vote");
        $(".btn-rate").attr("onClick", "delete_vote(" + book_id + ")");
    }