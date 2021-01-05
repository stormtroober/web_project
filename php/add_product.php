<?php

require_once("db/include.php");
require_once("utils/functions.php");

sec_session_start();
if(login_check($dbh->getDb()) == true){
  $userEmail = $_SESSION['user_id'];
  $templateParams["nome"] = "add_product_template.php";


  if(isset($_POST["name"], $_POST["brand"], $_POST["type"], $_POST["description"], 
  $_POST["price"], $_POST["quantity"]
  // $_POST["photoFront"], $_POST["photoBack"], 
  // $_POST["photoZoom"], $_POST["photoHead"]
  )) {

    $folderName = preg_replace('/\s+/', '_', $_POST["name"]);
    $path = "../resources/img/".$_POST["type"]."/".$folderName;
    if(!is_dir($path)){
      mkdir($path); 
    }

    echo $_POST["name"];
    echo $_POST["brand"];
    echo $_POST["type"];
    echo $_POST["description"];
    echo $_POST["price"];
    echo $_POST["quantity"];
    echo $path;
    echo $userEmail;
    $dbh->addProduct($_POST["name"], $_POST["brand"], $_POST["type"], $_POST["description"], 
    $_POST["price"], $_POST["quantity"], $path, $userEmail);


    // echo $_FILES['photoFront']['name'];
    // $uploaddir = 'path';
    // $uploadfile = $uploaddir . basename($_FILES['photoFront']['name']);
    // if (move_uploaded_file($_FILES['photoFront']['tmp_name'], $uploadfile)) {
    //     echo "File is valid, and was successfully uploaded.\n";
    // } else {
    //     echo "Possible file upload attack!\n";
    // }
    // echo 'Here is some more debugging info:';
    // print_r($_FILES);

  } 
} else {
$templateParams["nome"] = "slide-show.php";
}

require("template/base.php");
?>