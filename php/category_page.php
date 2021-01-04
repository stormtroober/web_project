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
if(isset($_POST["user_search"])) {
    $user_search = $_POST["user_search"];
}
$templateParams["categoria"] = $idcategoria;
if(isset($_GET["search"])) {
    $templateParams["articoli"] = $dbh->getPostByCategorySearch($idcategoria, $user_search);
} else {
    $templateParams["articoli"] = $dbh->getPostByCategory($idcategoria);
}
if(isset($_GET["order"])) {
    if($_GET["order"] == "asc") {
        
    } else if($_GET["order"] == "desc") {
        
    }
}

require("template/base.php");
?>
