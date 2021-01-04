<?php
require_once("db/include.php");

$userId = 1;
if(isset($_GET["id"])){
  $userId = $_GET["id"];
}
//TEST
$userEmail = "admin@admin.com";
$itemsInWishList = $dbh->getItemsFromWish($userEmail);

$items = array();
foreach($itemsInWishList as $item){
  array_push($items, $dbh->getArticleById($item["Prodotto"]));
}
var_dump($items);

$templateParams["nome"] = "wishlist_template.php";

require("template/base.php");
?>
