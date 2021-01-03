<?php
require_once("db/include.php");

$templateParams["nome"] = "cart_template.php";

$userId = 1;
if(isset($_GET["id"])){
  $userId = $_GET["id"];
}
$itemsInCart = $dbh->getArticlesFromCart($userId);
$items = array();
foreach($itemsInCart as $item){
  $items = $dbh->getArticleById($item["Prodotto"]);
}

require("template/base.php");
?>
