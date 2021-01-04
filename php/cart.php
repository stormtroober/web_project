<?php
require_once("db/include.php");

$userId = 1;
if(isset($_GET["id"])){
  $userId = $_GET["id"];
}
//TEST
$userEmail = "admin@admin.com";
$templateParams["itemsInCart"] = $dbh->getArticlesFromCart($userEmail);

var_dump($templateParams);
$templateParams["nome"] = "cart_template.php";

require("template/base.php");
?>
