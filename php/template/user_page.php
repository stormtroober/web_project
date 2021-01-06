<main>
  <div class="row py-4">
    <div class="col-md-1"></div>
    <div class="col-12 col-md-4 col-lg-3">
      <div class="list-group px-5 px-md-0">
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-dark text-white">Account</a>
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-light-gray fw-bold">Info</a>
        <a href="./login.php?info=ordini" class="list-group-item list-group-item-action">History</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-7 p-5 py-md-1">
      <span class = "h3">Informazioni Account</span>
      <div class="container px-0 py-3">
        <div class="input-group mb-3">
          <label class="form-control"><?php echo $templateParams["utente"][0]["Nome"] ?></label>
        </div>
        <div class="input-group mb-3">
          <label class="form-control"><?php echo $templateParams["utente"][0]["Cognome"] ?></label>
        </div>
        <div class="input-group mb-3">
          <label class="form-control"><?php echo $templateParams["utente"][0]["Email"] ?></label>
        </div>
        <div class="input-group mb-3">
          <label class="form-control"><?php echo $templateParams["utente"][0]["Indirizzo"] ?></label>
        </div>
      </div>
    </div>
    <div class="col-md-1">
      <form action="./logout.php" method="post">
        <input type="submit" value="Logout" id="logout" class="btn btn-dark float-end m-1">
      </form>
    </div>
  </div>
</main>