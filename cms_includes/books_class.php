<?php

$books = new Books;

class Books {

    public $current_book = array();
    public $current_book_reviews;
    public $other_books;

    function get_current_book()
    {
        $book = $this->get_book_by_id($_GET['book_id']);

        if($book==false)
        {
            header('Location: error_404.php');
        }

        $category_name = $this->get_category_name_by_id($book['category_id']);

        $author_id = $this->get_author_id_by_name($book['author']);

        $this->current_book = $book;
        $this->current_book['category_name'] = $category_name['name'];
        $this->current_book['author_id'] = $author_id['id'];

        $this->get_current_book_reviews($book['id']);
    }

    function get_book_by_id($book_id)
    {
        global $pdo;

        $sql = "SELECT * FROM `books` WHERE `id`='".$book_id."'";
        $result = $pdo->query($sql);
        return $result->fetch();
    }

    function get_category_name_by_id($category_id)
    {
        global $pdo;

        $sql = "SELECT * FROM `categories` WHERE `id`='".$category_id."'";
        $result = $pdo->query($sql);

        return $result->fetch();
    }

    function get_author_id_by_name($author_name)
    {
        global $pdo;

        $sql = "SELECT * FROM `authors` WHERE `name`='".$author_name."'";
        if($result = $pdo->query($sql)) {
            return $result->fetch();
        }
        else
        {
            return null;
        }
    }

    function get_current_book_reviews($book_id)
    {
        global $pdo;

        $sql = "SELECT * FROM `reviews` WHERE `book_id`='".$book_id."'";
        $result = $pdo->query($sql);

        $this->current_book_reviews = $result;
    }

    function get_user_name_by_id($user_id)
    {
        global $pdo;

        $sql = "SELECT * FROM `users` WHERE `id`='".$user_id."'";
        $result = $pdo->query($sql);
        $user = $result->fetch();

        return $user['name'];
    }

    function get_reviews_count($book_id)
    {
        global $pdo;

        $sql = "SELECT * FROM `reviews` WHERE `book_id`='".$book_id."'";
        $result = $pdo->query($sql);

        return $result->rowCount();
    }

    function get_votes_count($book_id)
    {
        global $pdo;

        $sql = "SELECT * FROM `votes` WHERE `book_id`='".$book_id."'";
        $result = $pdo->query($sql);

        return $result->rowCount();
    }

    function get_votes_average($book_id)
    {
        global $pdo;

        $number_of_votes = $this->get_votes_count($book_id);
        $sql = "SELECT * FROM `votes` WHERE `book_id`='".$book_id."'";
        $result = $pdo->query($sql);
        $votes_incrementation = 0;
        while($vote = $result->fetch())
        {
            $votes_incrementation += $vote['value'];
        }

        if(!$votes_incrementation==0)
        {
            $average = $votes_incrementation/$number_of_votes;
            $average = number_format((float)$average, 1, '.', '');

            return $average;
        }
        else
        {
            return '0.0';
        }
    }

    function get_votes_stars($book_id)
    {
        $average_of_votes = $this->get_votes_average($book_id);
        $stars = round($average_of_votes);

        return $stars;
    }

    function get_vote_by_user_id($user_id)
    {
        global $pdo;

        $sql = "SELECT * FROM `votes` WHERE `user_id`='".$user_id."'";
        $result = $pdo->query($sql);
        $vote = $result->fetch();

        return $vote['value'];
    }

    function get_categories()
    {
        global $pdo;

        $sql = "SELECT * FROM `categories` ORDER BY `name`";
        $result = $pdo->query($sql);

        return $result;
    }

    function get_author_biography_by_author_id($author_id)
    {
        global $pdo;

        $sql = "SELECT `biography` FROM `authors` WHERE `id`='".$author_id."'";
        $result = $pdo->query($sql);
        $author = $result->fetch();

        return $author['biography'];
    }
    
    function get_author_books_except_current()
    {
        global $pdo;

        $sql = "SELECT * FROM `books` WHERE `author`='".$this->current_book['author']."' AND NOT `id`='".$this->current_book['id']."' ORDER BY `id`";
        $result = $pdo->query($sql);
        $books = $result->fetch();

        $sql = "SELECT * FROM `books` WHERE `author`='".$this->current_book['author']."' AND NOT `id`='".$this->current_book['id']."' ORDER BY `id`";
        $result = $pdo->query($sql);
        $this->other_books = $result;
        
        return $books;
    }

    function rate($value, $book_id)
    {
        global $pdo;

        $sql = "INSERT INTO `votes` SET `book_id`='".$book_id."', `user_id`='".$_SESSION['user_id']."', `date_when_voted`=now(), `value`='".$value."'";
        $s = $pdo->prepare($sql);
        $s->execute();
    }

    function delete_vote($book_id)
    {
        global $db;
        global $user;

        $db->delete('votes', 'WHERE `book_id`="'.$book_id.'" AND `user_id`="'.$_SESSION['user_id'].'"');

        if($user->added_review($book_id))
        {
            $this->delete_review_by_book_id($book_id);
        }

        header('Location: view_book.php?book_id='.$book_id);
    }

    function this_review_is_this_user($review_id)
    {
        global $db;
        global $user;

        if($user->is_logged()) {
            $sql = $db->select('*', 'reviews', 'WHERE `id`="'.$review_id.'" AND `user_id`="'.USER_ID.'"');
            if($sql)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    function delete_review($review_id, $user_id)
    {
        global $db;

        if($user_id == USER_ID)
        {
            $current_review = $db->select('*', 'reviews', 'WHERE `id`="'.$review_id.'"');
            $sql = $db->delete('reviews', 'WHERE `id`="'.$review_id.'" AND `user_id`="'.$user_id.'"');
            if($sql)
            {
                header('Location: view_book.php?book_id='.$current_review['book_id'].'&notif=review_deleted_successfully#review-notif');
            }
            else
            {
                header('Location: index.php');
            }
        }
    }

    function delete_review_by_book_id($book_id)
    {
        global $db;

        $db->delete('reviews', 'WHERE `book_id`="'.$book_id.'" AND `user_id`="'.USER_ID.'"');
    }

}

?>