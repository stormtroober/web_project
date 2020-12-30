<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return !empty($_SESSION['idautore']);
}

function registerLoggedUser($user){
    $_SESSION["idautore"] = $user["idautore"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["nome"] = $user["nome"];
}

?>