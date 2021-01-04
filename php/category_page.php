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
$search = -2;
if(isset($_GET["search"])) {
    $search = $_GET["search"];
}
$user_search = -3;
if(isset($_POST["user_search"])) {
    $user_search = $_POST["user_search"];
}
if($search == "no") {
    $templateParams["articoli"] = $dbh->getPostByCategory($idcategoria);
    $templateParams["categoria"] = $idcategoria;
} else if($search == "yes") {
    $templateParams["articoli"] = $dbh->getPostByCategorySearch($idcategoria, $user_search);
    $templateParams["categoria"] = $idcategoria;
}
require("template/base.php");
?>
