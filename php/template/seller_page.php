<main>
  <div class="row py-4">
    <div class="col-md-1"></div>
    <div class="col-12 col-md-4 col-lg-3">
      <div class="list-group px-5 px-md-0">
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-dark text-white">Account</a>
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-light-gray fw-bold">Info</a>
        <a href="./login.php?info=prodotti" class="list-group-item list-group-item-action">Added products</a>
        <a href="./login.php?info=addp" class="list-group-item list-group-item-action">Add a product</a>
        <a href="./login.php?info=storico" class="list-group-item list-group-item-action">Order History</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-7 py-5 ps-4 py-md-1">
      <h3>Informazioni Account</h3>
      <div class="container ps-2 py-3">
        <div class="input-group mb-3">
          <label for="nome" class="col-form-control">First Name</label>
          <input type="text" readonly class="form-control-plaintext fs-5 ps-3" id="nome" value="<?php echo $templateParams["utente"][0]["Nome"] ?>">
        </div>
        <div class="input-group mb-3">
          <label for="cognome" class="col-form-control">Second Name</label>
          <input type="text" readonly class="form-control-plaintext fs-5 ps-3" id="cognome" value="<?php echo $templateParams["utente"][0]["Cognome"] ?>">
        </div>
        <div class="input-group mb-3">
        <label for="email" class="col-form-control">Email</label>
          <input type="text" readonly class="form-control-plaintext fs-5 ps-3" id="email" value="<?php echo $templateParams["utente"][0]["Email"] ?>">
        </div>
        <div class="input-group mb-3">
          <label for="indirizzo" class="col-form-control">Address</label>
          <input type="text" readonly class="form-control-plaintext fs-5 ps-3" id="indirizzo" value="<?php echo $templateParams["utente"][0]["Indirizzo"] ?>">
        </div>
      </div>
    </div>
    <div class="col-md-1">
      <form action="./logout.php" method="post">
        <input type="submit" value="Logout" id="logout" class="btn btn-dark float-end m-1">
      </form>
      <form action="./delete_account.php" method="post">
        <input type="submit" value="Delete Account" id="logout" class="btn btn-dark float-end m-1">
      </form>
    </div>
  </div>
</main>