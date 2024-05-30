<?php 
  include_once('../header.php'); 

  if(isset($_SESSION['username'])) { header('Location: /'); }
?>
<div class="container login">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-0">
          <div class="card p-4">
            <div class="card-body">
              <h1>Login</h1>
              <p class="text-muted">Sign In to your account</p>
              <form id="login" class="needs-validation" action="/includes/login.php" method="post">
                <div class="input-group mb-3">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                </div>
                <div class="input-group mb-4">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                </div>
                <div class="invalid-feedback">Please select a valid state.</div>
                <div class="row">
                  <div class="col-6">
                    <input type="submit" class="btn btn-primary px-4" id="loginBtn" name="loginBtn" value="Login">
                  </div>
                  <div class="col-6 text-right hidden">
                    <button type="button" class="btn btn-link px-0" id="forgotPassBtn">Forgot password?</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>Sign up</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript" src="/assets/js/login.js"></script>
<?php 
    include_once('../footer.php'); 
?>
