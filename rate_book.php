<?php
include 'cms_includes/cms_needs.php';

if($_REQUEST['value']<6 && !empty($_REQUEST['book_id']))
{
    if($user->is_logged())
    {
        $books->rate($_REQUEST['value'], $_REQUEST['book_id']);
    }
    else
    {
        echo "openLoginModal";
    }
}

?>