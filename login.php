<?php
include 'cms_includes/cms_needs.php';

if(isset($_POST['loginUserName']))
{
    $user->login($_POST);
}
?>