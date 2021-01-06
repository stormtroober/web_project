<main>
  <div class="row py-4">
    <div class="col-md-1"></div>
    <div class="col-12 col-md-4 col-lg-3">
      <div class="list-group px-5 px-md-0">
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-dark text-white">Account</a>
        <a href="./login.php?info=account" class="list-group-item list-group-item-action">Info</a>
        <a href="./login.php?info=prodotti" class="list-group-item list-group-item-action bg-light-gray fw-bold">Added products</a>
        <a href="./login.php?info=addp" class="list-group-item list-group-item-action">Add a product</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-7 px-1 px-lg-3 py-4 py-md-1">
      <?php foreach($templateParams["articoli"] as $articolo): ?>
      <div class="table-responsive">
        <?php
            if(!empty($templateParams["articoli"])) {?>
        <table class="table table-sm table-striped table-hover mt-4">
          <thead class="bg-dark text-white">
            <tr>
              <th scope="col">Photo</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center"><img
                  src="<?php echo UPLOAD_DIR."img/".$articolo["Tipo"]."/".$articolo["Foto"]."/front.png" ?>"
                  class="h-25" style="max-width:150px; max-height: 150px;" alt="<?php echo $articolo["Nome"] ?>"></td>
              <td class="align-middle"><?php echo $articolo["Nome"]; ?></td>
              <td class="align-middle"><?php echo $articolo["Prezzo"]; ?>$</td>
              <td class="align-middle">
                <form method="post" action="login.php?info=prodotti&remove=true&id=<?php echo $articolo["ID"]?>">
                  <input type="image" src="../resources/icons/remove.png" height="30" width="25" alt="remove_item">
                </form>
              </td>
            </tr>
          </tbody>
        </table>
        <?php } endforeach; 
        if (empty($templateParams["articoli"])){
          echo "<h2 class=\"ps-3\">You haven't added any items yet!</h2>"; 
        } ?>
      </div>
    </div>
</main>