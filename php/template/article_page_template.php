<?php $articolo = $templateParams["articolo"][0]; ?>
<div class="row">
  <div class="col-lg-4 col-12 col-md-6 pb-1 text-center p-4">
    <div id="articleCarousel" class="carousel slide overflow-hidden bg-dark rounded-3" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#articleCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#articleCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#articleCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#articleCarousel" data-bs-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo UPLOAD_DIR."img/$articleType/".$articolo["Foto"]."/front.png"; ?>" class="h-100 mw-100" alt="First slide">
        </div>
        <div class="carousel-item">
          <img src="<?php echo UPLOAD_DIR."img/$articleType/".$articolo["Foto"]."/back.png"; ?>" class="h-100 mw-100" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img src="<?php echo UPLOAD_DIR."img/$articleType/".$articolo["Foto"]."/zoom.png"; ?>" class="h-100 mw-100" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img src="<?php echo UPLOAD_DIR."img/$articleType/".$articolo["Foto"]."/head.png"; ?>" class="h-100 mw-100" alt="Fourth slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#articleCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#articleCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
  <div class="col-lg-5 col-12 col-md-6 my-3 p-5">
    <h3><?php echo $articolo["Nome"]; ?></h3>
    <p><?php echo $articolo["Descrizione"]; ?></p>
  </div>
  <div class="col-lg-3 col-12 col-md-12 my-3 py-4 px-3">
    <div class="border border-2 rounded-3">
      <div class="m-3 py-3 text-center border bg-light-gray rounded-3">
        <h2><?php echo $articolo["Prezzo"]?>$</h2>
      </div>
      <div class="py-3 text-center">
        <form method="post" action="article_page.php?add=true&id=<?php echo $articolo["ID"]?>&type=<?php echo $articleType?>">
          <button id="addToCart" type="submit" data-toggle="collapse" data-target="#added">Add to cart</button>
        </form>
      </div>
      <div class="collapse" id="added">
        <p>Added to cart</p>
      </div>
      <div class="py-3 text-center">
        <button>Add to WhishList</button>
      </div>
      <div class="text-center fs-5 p-4">
        <p>Items available: <?php echo $articolo["Quantità"]; ?></p>
      </div>
    </div>
  </div>
</div>                                                              