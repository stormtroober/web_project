<?php
require_once("db/include.php");
require_once("utils/functions.php");

$templateParams["nnotifiche"] = $dbh->getNotificationsNumber();

sec_session_start();
if(login_check($dbh->getDb()) == true){
  $templateParams["nome"] = "notifications_template.php";
  $templateParams["notificheAll"] = $dbh->getAllNotifications();
}
else{
  $templateParams["nome"] = "slide-show.php";  
}


require("template/base.php");
?>