<?php

include 'cms_includes/cms_needs.php';

if($user->is_logged() && !empty($_POST['book_id']) && $user->rated_book($_POST['book_id']) && !$user->added_review($_POST['book_id']))
{
    $db->insert('reviews', 'SET `book_id`="'.$_POST['book_id'].'", `user_id`="'.$_SESSION['user_id'].'", `description`="'.$_POST['description'].'", `date_of_publication`=now()');
    header('Location: view_book.php?book_id='.$_POST['book_id'].'&notif=review_added_successfully&review_id='.$db->last_insert_id().'#review-notif');
}
elseif(!$user->is_logged())
{
    header('Location: view_book.php?book_id='.$_POST['book_id'].'&notif=user_is_not_logged#review-notif');
}
elseif(!$user->rated_book($_POST['book_id']))
{
    header('Location: view_book.php?book_id='.$_POST['book_id'].'&notif=user_has_not_rated_book&review_description='.$_POST['description'].'#review-notif');
}
elseif($user->added_review($_POST['book_id']))
{
    header('Location: view_book.php?book_id='.$_POST['book_id'].'&notif=user_has_added_review_already#review-notif');
}

?>