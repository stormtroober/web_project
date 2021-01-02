<?php
require_once("db/include.php");

$templateParams["nome"] = "article_page_template.php";

$articleID = 1;
if(isset($_GET["id"])){
    $articleID = $_GET["id"];
}

$dbh->addToCart($userId, $articleID, 1);

require("template/base.php");
?>
