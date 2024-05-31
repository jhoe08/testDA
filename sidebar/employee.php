<div class="overflow-hidden card table-nowrap table-card">
    <aside class="user-info-wrapper pb-1">
        <div class="user-cover" style="background-image: url(/assets/images/bg1.jpg);">
            <div class="info-label" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward Points to spend">
                <i class="icon-medal"></i> 290 points
            </div>
        </div>
        <div class="user-info d-flex flex-column align-items-center">
            <div class="user-avatar">
                <a class="edit-avatar" href="#"></a><img src="/assets/images/<?php echo $userprofile; ?>" alt="User" <?php echo 'style="background: honeydew;"'?> ></div>
            <div class="user-data">
                <h4><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Department of Agriculture'; ?></h4><span>Joined <?php echo $usercreated; ?></span>
            </div>
            <div class="d-flex pt-3">
            <?php if(isset($_SESSION['username'])) { ?>
              <a class="btn logoutBtn text-danger" href="/includes/logout.php" data-bs-toggle="tooltip" data-bs-title="Logout"><i class="bi bi-door-open"></i> Logout</a>
            <?php } else { ?>
              <a class="btn loginBtn" href="/login" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLoginRight" aria-controls="offcanvasLoginRight"><i class="bi bi-door-closed"></i></i> Login</a>
            <?php } ?>
            </div>
        </div>
    </aside>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLoginRight" aria-labelledby="offcanvasLoginRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLoginRightLabel">Login</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
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