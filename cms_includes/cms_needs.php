<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT'].'/thelibrary');
define("INC", ROOT.'/cms_includes');
define("INC_HELP", INC.'/helpers');
define("INC_TEMPLATES", INC.'/templates');
define("ADMIN", ROOT.'/cms_admin');
define("INC_TEMPLATES_CSS", "/thelibrary/cms_includes/templates/css");
define("INC_JS", "/thelibrary/cms_includes/js");
define("UPLOADS_THUMB", "/thelibrary/cms_uploads/thumbnails");

session_start();

if(!empty($_SESSION['user_id']))
{
    define("USER_ID", $_SESSION['user_id']);
}

include INC.'/config.php';
include INC_HELP.'/template.php';
include INC_HELP.'/html.php';
include INC_HELP.'/string.php';
include INC.'/db_class.php';
include INC.'/books_class.php';
include INC.'/user_class.php';

?>