<?php
require_once("db/include.php");
$templateParams["nome"] = "wishlist_template.php";

// $userId = 1;
// if(isset($_GET["userId"])){
//   $userId = $_GET["userId"];
// }
//TEST
$userEmail = "admin@admin.com";
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
}


require("template/base.php");
?>