<?php
require_once("./db/include.php");


if(isset($_POST["name"], $_POST["surname"], $_POST["email"], $_POST["password"], $_POST["address"], $_POST["account_type"])) {
    $password = $_POST["password"]; 
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    $password = hash('sha512', $password.$random_salt);
    if ($insert_stmt = $dbh->getDb()->prepare("INSERT INTO UTENTI (Nome, Cognome, Email, Password, Salt, Tipo, Indirizzo) VALUES (?, ?, ?, ?, ?, ?, ?)")) {    
    $insert_stmt->bind_param('sssssss', $_POST["name"], $_POST["surname"], $_POST["email"], $password, $random_salt, $_POST["account_type"], $_POST["address"]);
    $insert_stmt->execute();
    $dbh->addCartToUser($_POST["email"]);
    $templateParams["errore_reg"] = "";
    $templateParams["nome"] = "slide-show.php";
    }
} else {
    if(isset($_GET["prova"])) {
        $templateParams["errore_reg"] = "Error! Insert all parameters!";
    }
    $templateParams["nome"] = "user_registration.php";
}

require("template/base.php");
?>