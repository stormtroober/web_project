<?php
require_once("./db/include.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        $templateParams["errore"] = "Errore! Email o password non corretti";
        $templateParams["nome"] = "user_login.php";
    }else{
        //registerLoggedUser($login_result[0]);
        $type = $dbh->getUserType($_POST["email"]);
        $type = $type[0]["Tipo"];
        if($type == "consumer") {
            $templateParams["nome"] = "user_page.php";
        } else if ($type == "seller") {
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