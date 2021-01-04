<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("db/include.php");

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

$userEmail = "admin@admin.com";
$Quantità = 1;
var_dump($add);
if($add == "cart"){
    $dbh->addToCart($userEmail, $articleID, $Quantità);
} else if($add == "wish"){
    var_dump($userEmail);
    var_dump($articleID);
    $dbh->addToWishList($userEmail, $articleID);
}
require("template/base.php");
?>
