<main>
  <div class="row py-4">
    <div class="col-md-1"></div>
    <div class="col-12 col-md-4 col-lg-3">
      <div class="list-group px-5 px-md-0">
        <a href="user_page.html" class="list-group-item list-group-item-action bg-dark text-white">Prodotti</a>
        <div class="list-group-item">
          <img src="../resources/img/Guitar/Fender_61_Telecaster/front.png" width="50px">
          <a class="w-100"> Nome Articolo</a>
          <a class="float-left">Quantità: 1</a>
        </div>
        <a href="user_page.html" class="list-group-item list-group-item-action">Account</a>
        <a href="order_history.html" class="list-group-item list-group-item-action">Cronologia ordini</a>
        <a href="payment_methods.html" class="list-group-item list-group-item-action">Metodi di pagamento</a>
        <a href="policy.html" class="list-group-item list-group-item-action">Politiche di Reso e Rimborso</a>
        <a href="contact_us.html" class="list-group-item list-group-item-action">Contattaci</a>
        <a href="user_settings.html" class="list-group-item list-group-item-action">Impostazioni</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-7 p-5 py-md-1">
      <h3>Informazioni Account</h3>
      <div class="container px-0 py-3">
        <div class="input-group mb-3">
          <label for="nome" class="form-control" ><?php echo $templateParams["utente"][0]["Nome"] ?></label>
        </div>
        <div class="input-group mb-3">
          <label for="cognome" class="form-control"><?php echo $templateParams["utente"][0]["Cognome"] ?></label>
        </div>
        <div class="input-group mb-3">
        <label for="email" class="form-control"><?php echo $templateParams["utente"][0]["Email"] ?></label>
        </div>
        <div class="input-group mb-3">
          <!--
          <input type="text" class="form-control" placeholder="Indirizzo di spedizione"
            aria-label="Recipient's username" aria-describedby="basic-addon2">
          -->
          <label for="indirizzo" class="form-control"><?php echo $templateParams["utente"][0]["Indirizzo"] ?></label>
          <!-- <button class="btn btn-dark" type="button" id="shipping_address">Modifica</button> -->
        </div>
      </div>
    </div>
    <div class="col-md-1">
      <button type="submit" class="btn btn-dark float-end m-1">Logout</button>
    </div>
  </div>
  <div class="row">
    <div class="col-12 container "></div>
  </div>
  </div>
</main>