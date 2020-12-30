<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("db/include.php");

$templateParams["nome"] = "article_list.php";

$idcategoria = -1;
if(isset($_GET["type"])){
    $idcategoria = $_GET["type"];
}
$templateParams["articoli"] = $dbh->getPostByCategory($idcategoria);
$templateParams["categoria"] = $idcategoria;

require("template/base.php");
?>
