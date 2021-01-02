<?php
require_once("db/include.php");

$templateParams["nome"] = "cart_template.php";

$articleID = 1;
if(isset($_GET["id"])){
    $articleID = $_GET["id"];
}
$articleType = "Guitar";
if(isset($_GET["type"])){
    $articleType = $_GET["type"];
}
$templateParams["articolo"] = $dbh->getArticleById($articleID);

require("template/base.php");
?>
