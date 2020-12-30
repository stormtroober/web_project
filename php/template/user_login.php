<main>
  <div class="row p-5">
    <div class="col-1 col-md-2 col-lg-3"></div>
    <div class="col-10 col-md-8 col-lg-6">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="show_password">
          <label class="form-check-label" for="show_password">Show password</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="account_type" id="consumer" value="consumer">
          <label class="form-check-label" for="consumer">Consumer</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="account_type" id="seller" value="seller">
          <label class="form-check-label" for="seller">Seller</label>
        </div>
        <button type="submit" class="btn btn-dark float-end m-1">Login</button>
        <button type="submit" class="btn btn-dark float-end m-1">Register</button>
      </form>
    </div>
    <div class="col-1 col-md-2 col-lg-3"></div>
  </div>
</main>