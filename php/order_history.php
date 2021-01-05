<?php
require_once("db/include.php");
require_once("utils/functions.php");


sec_session_start();
if(login_check($dbh->getDb()) == true){
    $userEmail = $_SESSION['user_id'];
    $templateParams["Ordini"] = $dbh->getOrdersFromUser($userEmail);
    $templateParams["nome"] = "order_history-template.php";
}

//require("template/base.php");
?>