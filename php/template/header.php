<div class="row">
    <div class="col-12 p-0">
        <header class="py-3 text-white bg-dark">
            <h1 class="text-monospace text-center"><a class="text-decoration-none text-white" href="index.php">Guitar Benter</a></h1>
        </header>
    </div>
</div>
<div class="row">
  <nav class="navbar navbar-expand-lg navbar-light bg-light-gray">
    <div class="container-fluid text-center">
      <a class="navbar-brand" href="index.php"><img src="../resources/icons/guitar.png" height="60" width="60" alt="guitar_home_icon"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item px-2">
            <div class="container-fluid text-center px-0">
              <a class="nav-link" href="./login.php"><img src="../resources/icons/profilo.png" height="30" width="30" alt="profile_icon"></a>
              <a class="nav-link active" href="./login.php" role="button">
                User Page
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="notifications.php"><img src="../resources/icons/notifica.png" height="30" width="30" alt="notifications_icon">
              <span class="badge rounded-pill bg-primary">
                <?php if(isset($templateParams["nnotifiche"])) {
                  echo $templateParams["nnotifiche"][0]["NNot"];
                } else {
                  echo 0;
                } ?>
              </span>
            </a>
            <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Notifications</a>
            <ul class="dropdown-menu">
            <?php
              if(!isset($templateParams["notifiche"])) {
                $templateParams["notifiche"] = $dbh->getNotifications();
              }
              foreach($templateParams["notifiche"]  as $notifica): 
                echo "<li class=\"dropdown-item\">".$notifica["Notifica"]."</li>";
              endforeach;
            ?>
            <li class="dropdown-item text-center">
              <a class="text-decoration-none text-primary" href="./clear_notifications.php?url=<?php echo basename($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING']; ?>">Clear All</a>
            </li>
            </ul>
          </li>
          <li class="nav-item text-center px-2">
            <a class="nav-link" href="cart.php"><img src="../resources/icons/carrello.png" height="30" width="30" alt="cart_icon"></a>
            <a class="nav-link active xs-text" aria-current="page" href="cart.php">Shopping Cart</a>
          </li>
          <li class="nav-item text-center px-2">
            <a class="nav-link" href="wishlist.php"><img src="../resources/icons/desideri.png" height="30" width="30" alt="wishlist_icon"></a>
            <a class="nav-link active xs-text" aria-current="page" href="wishlist.php">WishList</a>
          </li>
        </ul>
        <div id="order" class="dropdown">
            <button id="ddbt" class="btn btn-secondary dropdown-toggle m-2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Order by:
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="./category_page.php?type=<?php if(isset($idcategoria)) {
                echo $idcategoria;
              }?>&order=asc">Name [A-Z]</a>
              <a class="dropdown-item" href="./category_page.php?type=<?php if(isset($idcategoria)) {
                echo $idcategoria;
              }?>&order=desc">Name [Z-A]</a>
            </div>
          </div>
        <form action="./category_page.php?type=<?php if(isset($idcategoria)) {
                echo $idcategoria;
              }?>&search=y" method="post" id="search" class="d-flex px-3 px-sm-5 px-lg-0 i">
          <input class="form-control me-2" type="search" name="user_search" placeholder="Search" aria-label="Search">
          <button class="btn" type="submit"><img src="../resources/icons/lente.png" height="30" width="30" alt="search_icon"></button>
        </form>
      </div>
    </div>
  </nav>
</div>