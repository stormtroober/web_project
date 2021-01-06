<?php 
require_once("db/include.php");
require("utils/functions.php");

sec_session_start();
$email = $_SESSION["user_id"];
$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
session_destroy();
$dbh->deleteNotifications();
$templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
$dbh->addLastAccess($email);
header('Location: ./login.php');

?>