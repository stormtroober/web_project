<?php
require_once("db/include.php");

$templateParams["nome"] = "slide-show.php";
$templateParams["nnotifiche"] = $dbh->getNotificationsNumber();

require("template/base.php");
?>