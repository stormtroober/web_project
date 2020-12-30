<?php $articolo = $templateParams["articolo"][0]; ?>
<div class="row">
  <div class="col-lg-4 col-12 col-md-6 pb-1 text-center bg-dark">
    <div id="articleCarousel" class="carousel slide overflow-hidden" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#articleCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#articleCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#articleCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#articleCarousel" data-bs-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo UPLOAD_DIR."img/Guitars/".$articolo["Foto"]."/front.png"; ?>" class="h-100" alt="First slide">
        </div>
        <div class="carousel-item">
          <img src="<?php echo UPLOAD_DIR."img/Guitars/".$articolo["Foto"]."/back.png"; ?>" class="h-100" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img src="<?php echo UPLOAD_DIR."img/Guitars/".$articolo["Foto"]."/zoom.png"; ?>" class="h-100" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img src="<?php echo UPLOAD_DIR."img/Guitars/".$articolo["Foto"]."/head.png"; ?>" class="h-100" alt="Fourth slide">
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
  <div class="col-lg-4 col-12 col-md-6 my-3 p-5">
    <h3><?php echo $articolo["Nome"]; ?></h3>
    <p><?php echo $articolo["Descrizione"]; ?></p>
  </div>
  <div class="col-lg-1 col-0 p-0"></div>
  <div class="col-lg-3 col-12 col-md-12 my-3 py-4 px-3">
    <div class="border h-100">
      <div class="m-3 py-3 text-center border">
        <h2><?php echo $articolo["Prezzo"]?>$</h2>
      </div>
      <div class="py-3 text-center">
        <button>Add to cart</button>
      </div>
      <div class="py-3 text-center">
        <button>Add to WhishList</button>
      </div>
      <div class="text-left p-4">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
          Voluptates ad quae aliquam quia harum veritatis quis labore.</p>
      </div>
    </div>
  </div>
</div>