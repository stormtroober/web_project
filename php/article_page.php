<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("db/include.php");
require_once("utils/functions.php");

$templateParams["nome"] = "article_page_template.php";

$articleID = 1;
if(isset($_GET["id"])){
    $articleID = $_GET["id"];
}

$templateParams["articolo"] = $dbh->getArticleById($articleID);
$add = "false";
if(isset($_GET["add"])){
    $add = $_GET["add"];
}

$Quantità = 1;

sec_session_start();
if(login_check($dbh->getDb()) == true){
  $userEmail = $_SESSION['user_id'];
  if($add == "cart"){
    $notification = "Added ".$templateParams["articolo"][0]["Nome"]." to cart";
    $dbh->addNotification($notification);
    $templateParams["notifiche"] = $dbh->getNotifications();
    $dbh->addToCart($userEmail, $articleID, $Quantità);
} else if($add == "wish"){
    var_dump($userEmail);
    var_dump($articleID);
    $dbh->addToWishList($userEmail, $articleID);
    }
}   

//$userEmail = "admin@admin.com";

require("template/base.php");
?>
