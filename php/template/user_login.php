<main>
  <div class="row p-5">
    <div class="col-1 col-md-2 col-lg-3"></div>
    <div class="col-10 col-md-8 col-lg-6">
      <form action="login.php?info=account" method="post" name="login_form">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="email"
            placeholder="Enter email">
          <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
      <button class="btn btn-dark float-end m-1"><a class="text-decoration-none text-white" href="./registration.php">Register</a></button>
      </form>
    </div>
    <div class="col-1 col-md-2 col-lg-3"></div>
  </div>
</main>