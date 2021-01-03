<?php
require_once("db/include.php");
require("utils/functions.php");

sec_session_start();
if(isset($_POST['email'], $_POST['password'])) { 
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email."<br/>";
    echo $password."<br/>";
    if(login($email, $password, $dbh->getDb()) == true) {
        $templateParams["nome"] = "user_page.php";
        $templateParams["utente"] = $dbh->getUserByEmail($email);
        echo 'You have been logged in!';
    } else {
        $templateParams["errore"] = "Errore! Email o password non corretti";
        $templateParams["nome"] = "user_login.php";
    }
 } else {
    //echo 'Invalid Request';
    $templateParams["nome"] = "user_login.php";
 }
/*
if(isset($_COOKIE["login"])) {
    $templateParams["utente"] = $dbh->getUser($_COOKIE["login"]);
    if($templateParams["utente"][0]["Tipo"] == "consumer") {
      $templateParams["nome"] = "user_page.php";
    } else if ($templateParams["utente"][0]["Tipo"] == "seller") {
      //pagina venditore
    }
} else if(isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        $templateParams["errore"] = "Errore! Email o password non corretti";
        $templateParams["nome"] = "user_login.php";
    } else {
        $id = $dbh->getUserID($_POST["email"]);
        $templateParams["utente"] = $dbh->getUser($id[0]["ID"]);
        if($templateParams["utente"][0]["Tipo"] == "consumer") {
            $templateParams["nome"] = "user_page.php";
        } else if ($templateParams["utente"][0]["Tipo"] == "seller") {
            echo "seller";
        }
    setcookie('login', $id[0]["ID"], time() + (60*60*24*1000));
    }
} else {
    $templateParams["nome"] = "user_login.php";
}
*/

require("template/base.php");
?>