<?php
require_once("db/include.php");
require("utils/functions.php");

sec_session_start();
if(login_check($dbh->getDb()) == true) {
    $templateParams["utente"] = $dbh->getUserByEmail($_SESSION['user_id']);
    if (isset($_GET["info"])) {
        $info = $_GET["info"];
        if ($info == "account") {
            if ($templateParams["utente"][0]["Tipo"] == "consumer") {
                $templateParams["nome"] = "user_page.php";
            } else {
                echo "seller";
            }
        } else if($info == "ordini") {
            $templateParams["nome"] = "order_history.php";
        }
    } else {
        if ($templateParams["utente"][0]["Tipo"] == "consumer") {
            $templateParams["nome"] = "user_page.php";
        } else {
            echo "seller";
        }
    }
 } else {
    //echo 'You are not authorized to access this page, please login. <br/>';
    if(isset($_POST['email'], $_POST['password'])) { 
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(login($email, $password, $dbh->getDb()) == true) {
            $templateParams["nome"] = "user_page.php";
            $templateParams["utente"] = $dbh->getUserByEmail($email);
        } else {
            $templateParams["errore_login"] = "Error! Email or password are incorrect!";
            $templateParams["nome"] = "user_login.php";
        }
     } else {
        //echo 'Invalid Request';
        $templateParams["nome"] = "user_login.php";
     }
 }

require("template/base.php");
?>