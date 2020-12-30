<?php
require_once("db/include.php");

$templateParams["nome"] = "article_page_template.php";

$idArticolo = 1;
if(isset($_GET["id"])){
    $idArticolo = $_GET["id"];
}
$templateParams["articolo"] = $dbh->getArticleById($idArticolo);
require("template/base.php");
?>
