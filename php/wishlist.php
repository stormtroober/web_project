<?php
require_once("db/include.php");
require_once("utils/functions.php");

$templateParams["nnotifiche"] = $dbh->getNotificationsNumber();

sec_session_start();
if(login_check($dbh->getDb()) == true){
  $templateParams["nome"] = "wishlist_template.php";
  $userEmail = $_SESSION['user_id'];
  $utente = $dbh->getUserByEmail($userEmail);
  if($utente[0]["Tipo"] == "consumer"){
    $itemsInWishList = $dbh->getItemsFromWish($userEmail);
    
    $items = array();
    foreach($itemsInWishList as $item){
      array_push($items, $dbh->getArticleById($item["Prodotto"]));
    }
    
    $remove = false;
    $articleToRemove = -1;
    if(isset($_GET["remove"])){
      $remove = $_GET["remove"];
    }
    if(isset($_GET["id"])){
      $articleToRemove = $_GET["id"];
    }
    if($remove == true){
      $dbh->removeItemFromWish($userEmail, $articleToRemove);
      header("Refresh:0; url=wishlist.php");
    }
  }
  else {
    $notification = "Access Denied to WhishList, this is a Seller account!";
    $dbh->addNotification($notification);
    $templateParams["notifiche"] = $dbh->getNotifications();
    $templateParams["nome"] = "slide-show.php";
  }
}
else{
  $templateParams["nome"] = "slide-show.php";  
}


require("template/base.php");
?>