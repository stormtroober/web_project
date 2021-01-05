<div class="row">
  <div class="col-lg-2"></div>
    <div class="col-12 col-lg-8 mt-5">
    <h2 class="px-3">WhishList</h2>
      <div class="table-responsive" >
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
            <?php foreach($items as $artArray): 
                    $articolo = $artArray[0]; ?>
              <tr>
                <td class="text-center"><img src="<?php echo UPLOAD_DIR."img/".$articolo["Tipo"]."/".$articolo["Foto"]."/front.png" ?>" class="h-25" style="max-width:150px"></td>
                <td class="align-middle"><?php echo $articolo["Nome"]; ?></td>
                <td class="align-middle"><?php echo $articolo["Prezzo"]; ?>$</td>
                <td class="align-middle">
                  <form method="post" action="whishlist.php?remove=true&id=<?php echo $articolo["ID"]?>">
                    <input type="image" src="../resources/icons/remove.png" height="30" width="25"></input>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  <div class="col-lg-2"></div>
</div>