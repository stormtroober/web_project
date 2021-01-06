<?php
require_once("db/include.php");
require_once("utils/functions.php");

$url = "index.php";
if(isset($_GET["url"])) {
    $url = $_GET["url"];
    echo $url;
}

sec_session_start();
if(login_check($dbh->getDb()) == true){
    $dbh->deleteNotifications();
    $templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
    header("Location: ".$url);
}
else{
    $templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
    header("Location: ".$url);
}

require("template/base.php");
?>
