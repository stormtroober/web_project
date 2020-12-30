<?php
require_once("bootstrap.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        echo "Errore! Email o password non corretti";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    if(isset($_POST["type"])) {
        if($_POST["type"] == "Consumer") {
            $templateParams["nome"] = "user_page.php";
        } else if ($_POST["type"] == "Seller") {
            echo "seller";
        }
    }
}
else{
    $templateParams["nome"] = "user_login.php";
}

/*
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["articoli"] = $dbh->getPosts(2);
*/
require("template/base.php");
?>