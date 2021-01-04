<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("db/include.php");

$userId = 1;
if(isset($_GET["id"])){
  $userId = $_GET["id"];
}
//TEST
$userEmail = "prova@example.com";
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


$templateParams["nome"] = "cart_template.php";

require("template/base.php");
?>
