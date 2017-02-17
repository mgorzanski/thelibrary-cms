<?php
include 'cms_includes/cms_needs.php';

if(!empty($_POST['book_id']))
{
    if($user->is_logged())
    {
        $books->delete_vote($_POST['book_id']);
        $review = $user->added_review($_POST['book_id']);
        if($review)
        {
            $user->delete_review($review['id'], $_POST['book_id']);
        }
    }
}

?>