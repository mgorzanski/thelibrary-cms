<?php
include 'cms_includes/cms_needs.php';

if(!empty($_REQUEST['book_id']))
{
    if($user->is_logged())
    {
        $books->delete_vote($_REQUEST['book_id']);
        echo "voteDeleted";
    }
}

?>