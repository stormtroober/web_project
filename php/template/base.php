<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Guitar Benter</title>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style/style.css">
    
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../JS/functions.js"></script>
    <script src="../JS/available.js"></script>
    <script type="text/javascript" src="../JS/sha512.js"></script>
    <script type="text/javascript" src="../JS/forms.js"></script>
  </head>
  <body class="bg-light">
    <div class="d-flex flex-column min-vh-100 container-fluid">
        <?php require("header.php") ?>
        <?php
          if(isset($templateParams["nome"])) {
            require($templateParams["nome"]);
          }
        ?>
    </div>
    <?php require("footer.php") ?>
  </body>
</html>