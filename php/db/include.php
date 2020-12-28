<?php 

require_once("database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "blogtw");
define("UPLOAD_DIR", "../resources/img/");

?>