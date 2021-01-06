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
  $templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
  $utente = $dbh->getUserByEmail($userEmail);
  if($add == "cart"){
    if($utente[0]["Tipo"] == "consumer"){
        $addres = $dbh->addToCart($userEmail, $articleID, $Quantità);
        header("Location: article_page.php?add=false&id=".$articleID);
        if ($addres == -2) {
            $notification = "Can't add ".$templateParams["articolo"][0]["Nome"]." to cart, already added";
            $dbh->addNotification($notification);
            $templateParams["notifiche"] = $dbh->getNotifications();
            $templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
        } else if($addres == -1) {
            $notification = "Can't add ".$templateParams["articolo"][0]["Nome"]." to cart, there are no more";
            $dbh->addNotification($notification);
            $templateParams["notifiche"] = $dbh->getNotifications();
            $templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
        } else {
            $notification = "Added ".$templateParams["articolo"][0]["Nome"]." to cart";
            $dbh->addNotification($notification);
            $templateParams["notifiche"] = $dbh->getNotifications();
            $templateParams["nnotifiche"] = $dbh->getNotificationsNumber();
        }
    }
    } else if($add == "wish"){
        if($utente[0]["Tipo"] == "consumer"){
            header("Location: article_page.php?add=false&id=".$articleID);
            $notification = "Added ".$templateParams["articolo"][0]["Nome"]." to wish list";
            $dbh->addNotification($notification);
            $templateParams["notifiche"] = $dbh->getNotifications();
            $dbh->addToWishList($userEmail, $articleID);
        }
    }
}   

//$userEmail = "admin@admin.com";

require("template/base.php");
?>
