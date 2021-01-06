<?php 
require_once("db/include.php");
require("utils/functions.php");

$templateParams["nnotifiche"] = $dbh->getNotificationsNumber();

sec_session_start();
if(login_check($dbh->getDb()) == true){
    $dbh->deleteNotifications();
    $dbh->deleteAccount($_SESSION["user_id"]);
    $templateParams["nome"] = "slide-show.php";
}
else{
    $templateParams["nome"] = "slide-show.php";
}

require("template/base.php");
?>