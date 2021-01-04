<?php
require_once("db/include.php");

$userId = 1;
if(isset($_GET["id"])){
  $userId = $_GET["id"];
}
//TEST
$userEmail = "admin@admin.com";
$itemsInCart = $dbh->getArticlesFromCart($userEmail);

$items = array();
foreach($itemsInCart as $item){
  $items = $dbh->getArticleById($item["Prodotto"]);
}
var_dump($itemsInCart);
$templateParams["nome"] = "cart_template.php";

require("template/base.php");
?>
