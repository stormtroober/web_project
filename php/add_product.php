<?php

require_once("db/include.php");
require_once("utils/functions.php");

sec_session_start();
if(login_check($dbh->getDb()) == true){
  $userEmail = $_SESSION['user_id'];
  $templateParams["nome"] = "add_product_template.php";
  
  if(isset($_POST["name"], $_POST["brand"], $_POST["type"], $_POST["description"], 
  $_POST["feature1"], $_POST["feature2"], $_POST["feature3"], $_POST["price"], $_POST["quantity"]
  )) {
    
    $folderName = preg_replace('/\s+/', '_', $_POST["name"]);
    $path = "../resources/img/".$_POST["type"]."/".$folderName;
    if(!is_dir($path)){
      mkdir($path); 
    }
    
    $features = $_POST["feature1"]."-".$_POST["feature2"]."-".$_POST["feature3"];
    $dbh->addProduct($_POST["name"], $_POST["brand"], $_POST["type"], $_POST["description"], $features,
    $_POST["price"], $_POST["quantity"], $folderName, $userEmail);

    $_FILES['photoFront']['name'] = "front.png";
    $uploadfile = $path."/".basename($_FILES['photoFront']['name']);
    echo $uploadfile;
    if (move_uploaded_file($_FILES['photoFront']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }
    $_FILES['photoBack']['name'] = "back.png";
    $uploadfile = $path."/".basename($_FILES['photoBack']['name']);
    if (move_uploaded_file($_FILES['photoBack']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }
    $_FILES['photoZoom']['name'] = "zoom.png";
    $uploadfile = $path."/".basename($_FILES['photoZoom']['name']);
    if (move_uploaded_file($_FILES['photoZoom']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }
    $_FILES['photoHead']['name'] = "head.png";
    $uploadfile = $path."/".basename($_FILES['photoHead']['name']);
    if (move_uploaded_file($_FILES['photoHead']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }


  } 
} else {
$templateParams["nome"] = "slide-show.php";
}

require("template/base.php");
?>