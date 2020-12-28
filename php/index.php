<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Guitar Benter</title>
  </head>
  <body class="bg-light">
    <div class="container-fluid">
        <?php require("header.php") ?>
        <div class="row">
          <div class="text-center bg-dark nopadding">
            <div id="articleCarousel" class="carousel slide overflow-hidden" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#articleCarousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#articleCarousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#articleCarousel" data-bs-slide-to="2"></li>
                <li data-bs-target="#articleCarousel" data-bs-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <a href="category_page.html"><img src="../resources/guitarindex.jpg" class="carousel-width" alt="First slide"></a>
                  <div class="carousel-caption d-md-block">
                    <h2>Guitars</h2>
                  </div>
                </div>
                <div class="carousel-item">
                  <a href="category_page.html"><img src="../resources/bassindex.jpg" class="carousel-width" alt="Second slide"></a>
                  <div class="carousel-caption d-md-block">
                    <h2>Bass Guitars</h2>
                  </div>
                </div>
                <div class="carousel-item">
                  <a href="category_page.html"><img src="../resources/ampsindex.jpg" class="carousel-width" alt="Third slide"></a>
                  <div class="carousel-caption d-md-block">
                    <h2>Amplifiers</h2>
                  </div>
                </div>
                <div class="carousel-item">
                  <a href="category_page.html"><img src="../resources/accessoriesindex.jpg" class="carousel-width" alt="Fourth slide"></a>
                  <div class="carousel-caption d-md-block">
                    <h2>Accessories</h2>
                  </div>
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
        </div>
        <div class="row"> 
          <div class="col-md-2"></div>
          <div class="col-md-8 col-12 text-center">
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
            <p>Vivamus neque purus, euismod tristique interdum sed, volutpat ut lectus. Proin convallis consectetur dui vel luctus. Nunc et vulputate quam. 
              Vestibulum vitae magna in arcu vehicula faucibus. 
              Donec vestibulum finibus sapien, eu viverra nulla auctor eget. Donec congue dignissim orci non placerat. 
              Suspendisse ante augue, euismod quis magna a, iaculis pretium tortor.</p>
          </div>
          <div class="col-md-2"></div>
        </div>
        <?php require("footer.php") ?>
    </div>
  </body>
</html>