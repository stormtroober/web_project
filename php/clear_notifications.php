<?php
require_once("db/include.php");
require_once("utils/functions.php");

sec_session_start();
if(login_check($dbh->getDb()) == true){
    $dbh->deleteNotifications();
    $templateParams["nome"] = "slide-show.php";
}
else{
    $templateParams["nome"] = "slide-show.php";
}

require("template/base.php");
?>
