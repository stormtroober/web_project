<?php
require_once("db/include.php");
require("utils/functions.php");

$templateParams["nnotifiche"] = $dbh->getNotificationsNumber();

sec_session_start();
if(login_check($dbh->getDb()) == true) {
    $userEmail = $_SESSION['user_id'];
    $templateParams["utente"] = $dbh->getUserByEmail($userEmail);
    if (isset($_GET["info"])) {
        $info = $_GET["info"];
        if ($info == "account") {
            if ($templateParams["utente"][0]["Tipo"] == "consumer") {
                $templateParams["nome"] = "user_page.php";
            } else {
                $templateParams["nome"] = "seller_page.php";
            }
        } else if($info == "ordini") {
            $templateParams["ordini"] = $dbh->getOrdersFromUser($userEmail);
            $itemsInCart = array(); 
            foreach($templateParams["ordini"] as $ordine){
                array_push($itemsInCart, $dbh->getProdFromCart($ordine["IdCarrello"]));
            }
            $itemsDetail = array(); $arr = array();
            foreach($itemsInCart as $itemsInOrder){
                foreach($itemsInOrder as $item){
                    array_push($arr, $dbh->getArticleById($item["Prodotto"]));
                }
                array_push($itemsDetail, $arr);
                $arr = array();
            }
            $templateParams["nome"] = "order_history-template.php";
        } else if($info == "addp") {
            $templateParams["nome"] = "add_product_template.php";
        } else if($info == "prodotti") {
            if(isset($_GET["remove"], $_GET["id"] )){
                if($_GET["remove"]){
                    $dbh->removeProduct($userEmail, $_GET["id"]);
                }
            }
            $templateParams["articoli"] = $dbh->getPostByUser($userEmail);
            $templateParams["nome"] = "added_product_template.php"; //PAGINA PRODOTTI INSERITI
        }
        else if($info == "storico"){
            //TOMMI QUA
            $templateParams["nome"] = "order_history_seller.php";
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
            $templateParams["utente"] = $dbh->getUserByEmail($email);
            if ($templateParams["utente"][0]["Tipo"] == "consumer") {
                $templateParams["nome"] = "user_page.php";
            } else {
                $templateParams["nome"] = "seller_page.php";
            }
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