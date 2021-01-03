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
$articleType = "Guitar";
if(isset($_GET["type"])){
    $articleType = $_GET["type"];
}
$templateParams["articolo"] = $dbh->getArticleById($articleID);
$addToCart=false;
if(isset($_GET["add"])){
    $addToCart = $_GET["add"];
}
$userEmail = "prova@example.com";
$Quantità = 1;
if($addToCart == true){
    $dbh->addToCart($userEmail, $articleID, $Quantità);
}
require("template/base.php");
?>
