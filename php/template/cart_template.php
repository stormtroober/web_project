<main>
  <div class="row py-4">
    <div class="col-lg-1"></div>
    <div class="col-12 col-lg-5 px-3 px-lg-0">
      <div class="list-group pe-lg-2 pe-xl-5">
        <a href="user_page.html" class="list-group-item list-group-item-action bg-dark text-white">Lista prodotti</a>
        <?php foreach($items as $art_array): 
          $articolo = $art_array[0];
          ?>
          <div class="list-group-item">
            <img src="<?php echo UPLOAD_DIR."img/".$articolo["Tipo"]."/".$articolo["Foto"]."/front.png"?>"
            class="float-start m-2" width="75px">
            <a href="article_page.php?add=false&id=<?php echo $articolo["ID"]."&type=".$articolo["Tipo"]; ?>" 
            class="fs-4 text-dark px-4"><?php echo $articolo["Nome"]; ?></a>
            <p class="fs-3 text-decoration-none p-4 float-end"><?php echo $articolo["Prezzo"]; ?></a>
            <p class="float-end position-absolute bottom-0 end-0 p-4"><?php echo $articolo["Quantità"]; ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-12 col-lg-5 px-3 py-2 bg-light-gray rounded-3">
      <h3 class="text-center">Carrello</h3>
      <table class="table table-striped table-hover pt-4">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($items as $art_array): 
          $articolo = $art_array[0];
            ?>
            <tr>
              <td><?php echo $articolo["Nome"]; ?></td>
              <td>x<?php echo $articolo["Quantità"]; ?></td>
              <td><?php echo ($articolo["Quantità"] * $articolo["Prezzo"]) ?>$</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot class="fw-bold">
          <tr>
            <td>Total</td>
            <td></td>
            <td>999$</td>
          </tr>
        </tfoot>
      </table>
      <div class="container-fluid">
        <button type="button" class="btn btn-dark float-end mt-4">Buy now</button>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</main>