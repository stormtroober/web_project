<main>
  <div class="row px-3 pt-5">
    <div class="col-md-2 col-lg-3"></div>
    <div class="col-12 col-md-8 col-lg-6">
      <form action="login.php?info=account" method="post" name="login_form">
        <div class="form-group">
          <label for="email">Email address</label>
          <input id="email" name="email" type="email" class="form-control" aria-describedby="email"
            placeholder="Enter email">
          <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="show_password">
          <label class="form-check-label" for="show_password">Show password</label>
        </div>
        <?php if(isset($templateParams["errore_login"])) {
          echo $templateParams["errore_login"];
        } ?>
        <input type="submit" value="Login" class="btn btn-dark float-end m-1">
      <a class="btn btn-dark float-end m-1 text-decoration-none text-white" href="./registration.php">Register</a>
      </form>
    </div>
    <div class="col-md-2 col-lg-3"></div>
  </div>
</main>