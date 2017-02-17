<?php

include 'cms_includes/cms_needs.php';

if($user->is_logged() && !empty($_GET['review_id']) && !empty($_GET['user_id']))
{
    $books->delete_review($_GET['review_id'], $_GET['user_id']);
}

?>