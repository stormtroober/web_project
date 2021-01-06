<?php 
require_once("db/include.php");
require("utils/functions.php");

sec_session_start();
$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
session_destroy();
$dbh->deleteNotifications();
$templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
header('Location: ./login.php');

?>