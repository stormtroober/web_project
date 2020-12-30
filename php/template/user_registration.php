<main>
  <div class="row p-5">
    <div class="col-1 col-md-2 col-lg-3"></div>
    <div class="col-10 col-md-8 col-lg-6">
      <form action="registration.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" aria-describedby="name"
            placeholder="Enter Name">
        </div>
        <div class="form-group">
        <label for="surname">Surname</label>
          <input type="text" class="form-control" name="surname" aria-describedby="surname"
            placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="email"
            placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="show_password">
          <label class="form-check-label" for="show_password">Show password</label>
        </div>
        <div class="form-group">
          <label for="text">Address</label>
          <input type="text" class="form-control" name="address" aria-describedby="address"
            placeholder="Enter address">
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="account_type" id="consumer" value="consumer">
          <label class="form-check-label" for="consumer">Consumer</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="account_type" id="seller" value="seller">
          <label class="form-check-label" for="seller">Seller</label>
        </div>
        <button type="submit" class="btn btn-dark float-end m-1">Register</button>
      </form>
    </div>
    <div class="col-1 col-md-2 col-lg-3"></div>
  </div>
</main>