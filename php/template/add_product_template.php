<main>
  <div class="row py-4">
    <div class="col-md-1"></div>
    <div class="col-12 col-md-4 col-lg-3">
      <div class="list-group px-5 px-md-0">
        <a href="./login.php?info=account" class="list-group-item list-group-item-action bg-dark text-white">Account</a>
        <a href="./login.php?info=account" class="list-group-item list-group-item-action">Info</a>
        <a href="./login.php?info=ordini" class="list-group-item list-group-item-action">History</a>
        <a href="add_product.php" class="list-group-item list-group-item-action bg-light-gray fw-bold">Add a product</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-7 p-5 py-md-1">
      <h3>Aggiungi un prodotto</h3>
      <div class="container px-0 py-3">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="name" class="form-control" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Brand</label>
            <input type="brand" class="form-control" placeholder="Brand">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Type</label>
            <select class="form-control">
              <option>Guitar</option>
              <option>Bass</option>
              <option>Amplifier</option>
              <option>Accessories</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1">Price</label>
            <input type="brand" class="form-control" placeholder="Price">
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1">Quantity</label>
            <input type="brand" class="form-control" placeholder="Quantity">
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="customFile">Photo Front</label>
            <input type="file" class="form-control form-control-sm" id="customFile" />
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="customFile">Photo Back</label>
            <input type="file" class="form-control form-control-sm" id="customFile" />
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="customFile">Photo Zoom</label>
            <input type="file" class="form-control form-control-sm" id="customFile" />
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="customFile">Photo Head</label>
            <input type="file" class="form-control form-control-sm" id="customFile" />
          </div>
          <div class="form-group p4 float-end">
            <button type="submit" class="btn btn-dark btn-lg">Update</button>
          </div>
        </form>
      </div>

    </div>
    <div class="row">
      <div class="col-12 container "></div>
    </div>
  </div>
</main>