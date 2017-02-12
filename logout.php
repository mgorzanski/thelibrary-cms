<?php
include 'cms_includes/cms_needs.php';

unset($_SESSION['logged']);
unset($_SESSION['user_id']);
session_destroy();

header('Location: index.php');