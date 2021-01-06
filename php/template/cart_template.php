<main>
  <div class="row py-4">
    <div class="col-lg-1"></div>
    <div class="col-12 col-lg-5 px-3 px-lg-0">
      <div class="list-group pe-lg-3 pe-xl-5">
        <a href="user_page.html" class="list-group-item list-group-item-action bg-dark text-white">Product List</a>
        <?php foreach($items as $art_array): 
          $articolo = $art_array[0];
          ?>
          <div class="list-group-item">
            <img src="<?php echo UPLOAD_DIR."img/".$articolo["Tipo"]."/".$articolo["Foto"]."/front.png"?>"
            class="float-start m-2" width="75px">
            <a href="article_page.php?add=false&id=<?php echo $articolo["ID"]."&type=".$articolo["Tipo"]; ?>" 
            class="text-dark"><?php echo $articolo["Nome"]; ?></a>
            <p class="fs-4 text-decoration-none p-4 float-end"><?php echo $articolo["Prezzo"]; ?>$</a>
            <p class="float-end position-absolute bottom-0 end-0 p-4">x<?php echo $articolo["Quantità"]; ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-12 col-lg-5 p-3 bg-light-gray h-100" style="border: 20px solid #f8f9fa; border-radius: 25px;">
      <h3 class="text-center p-2">Shopping Cart</h3>
      <table class="table table-striped table-hover pt-4">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($items as $art_array): 
          $articolo = $art_array[0];
            ?>
            <tr>
              <td><?php echo $articolo["Nome"]; ?></td>
              <td>
              <img src="../resources/icons/minus.png" alt="minus" height="20px" width="20px"></img>
              x<?php echo $articolo["Quantità"]; ?>
              <img src="../resources/icons/plus.png" alt="plus" height="15px" width="15px" class="mb-1"></img>
              </td>
              <td>
                <?php 
                  global $totale;
                  $subtot = $articolo["Quantità"] * $articolo["Prezzo"];
                  echo $subtot."$";
                  $totale = $subtot + $totale;
                  ?>
              </td>
              <td>
              <form method="post" action="cart.php?remove=true&id=<?php echo $articolo["ID"]?>">
                <input type="image" src="../resources/icons/remove.png" height="30" width="25"></input>
              </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot class="fw-bold">
          <tr>
            <td>Total</td>
            <td></td>
            <td>
            <?php
            if(isset($totale)){
              echo $totale."$"; 
            } else {
              echo "Cart empty";
            }
            ?></td>
          </tr>
        </tfoot>
      </table>
      <div class="container-fluid">
      <form method="post" action="cart.php?buy=true">
        <button type="submit" class="btn btn-dark float-end mt-4 mb-2">Buy now</button>
      </form>
      <form method="post" action="cart.php?delete=true">
        <button type="submit" class="btn btn-dark mt-4 mb-2">Delete cart</button>
      </form>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</main>