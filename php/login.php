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
                $templateParams["nome"] = "seller_page.php";
            }
        } else if($info == "ordini") {
            $userEmail = $_SESSION['user_id'];
            $templateParams["Ordini"] = $dbh->getOrdersFromUser($userEmail);
            $templateParams["nome"] = "order_history-template.php";
        } else if($info == "addp") {
            $templateParams["nome"] = "add_product_template.php";
        } else if($info == "prodotti") {
            $templateParams["nome"] = ""; //PAGINA PRODOTTI INSERITI
        }
    } else {
        if ($templateParams["utente"][0]["Tipo"] == "consumer") {
            $templateParams["nome"] = "user_page.php";
        } else {
            $templateParams["nome"] = "seller_page.php";
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