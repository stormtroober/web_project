<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("db/include.php");
require_once("utils/functions.php");

$userId = 1;
if(isset($_GET["id"])){
  $userId = $_GET["id"];
}

sec_session_start();
if(login_check($dbh->getDb()) == true){
  $userEmail = $_SESSION['user_id'];
  $itemsInCart = $dbh->getArticlesFromCart($userEmail);

  $items = array();
  $counterItems = 0;
  foreach($itemsInCart as $item){
    $counterItems++;
    array_push($items, $dbh->getArticleById($item["Prodotto"]));
  }

  for($i = 0; $i < $counterItems; $i++){
    $items[$i][0]["Quantità"] = $itemsInCart[$i]["Quantità"];
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
    $dbh->removeItemFromCart($userEmail, $articleToRemove);
  }
  $buy = false;
  if(isset($_GET["buy"])){
    $buy = $_GET["buy"];
  }
  if($buy == true){
    $returnValue = $dbh->buyCart($userEmail);
    if($returnValue == -1){
      echo "prodotti non disponibili";
      $templateParams["nome"] = "cart_template.php";
    }
    else{
      $templateParams["nome"] = "slide-show.php";
    }
  }
  else{
    $templateParams["nome"] = "cart_template.php";
  }
}
else{
  $templateParams["nome"] = "slide-show.php";
}



require("template/base.php");
?>
