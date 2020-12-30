<?php
require_once("./db/include.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        echo "Errore! Email o password non corretti";
        $templateParams["nome"] = "user_login.php";
    }
    else{
        //registerLoggedUser($login_result[0]);
        if($dbh->getUserType($_POST["email"]) == "consumer") {
            $templateParams["nome"] = "user_page.php";
        } else if ($dbh->getUserType($_POST["email"]) == "seller") {
            echo "seller";
        }
    }
} else {
    $templateParams["nome"] = "user_login.php";
}
/*
if(isUserLoggedIn()){
    if($_POST["type"] == "Consumer") {
        $templateParams["nome"] = "user_page.php";
    } else if ($_POST["type"] == "Seller") {
        echo "seller";
    }
}
else{
    $templateParams["nome"] = "user_login.php";
}
*/

require("template/base.php");
?>