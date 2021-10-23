<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="bootstrap-5.1.2-dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>
    <header class="p-3 mb-3 border-bottom">
      <nav id="navbar_bg" class="navbar navbar-expand-md navbar-dark fixed-top ">
        <div class="container-fluid">
          <div id="navbar_" class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a id="list_item_" href="" class="nav-link px-2 link-dark">Home</a></li>
              <!--<li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>-->
            </ul>
            <!--THIS TOGGLES WHEN THE USER LOGINS; DISPLAY NONE;-->
            <div id="login_signup_" style='<?php echo $_SESSION['login_signup_display_style']; ?>'>
              <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a id="list_item_" class="nav-link px-2 link-dark" href="login/">Login</a></li>
                <li><a id="list_item_" class="nav-link px-2 link-dark" href="form/">Sign up</a></li>
              </ul>
            </div>
            <!--THIS TOGGLES WHEN THE USER LOGINS-->
            <div id="login_dropdown_" class="dropdown text-end" style="<?php echo $_SESSION['display_user_style']; ?>">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="images/profile-silhouette.png" alt="mdo" class="rounded-circle" width="32" height="32">
              </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="profile">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="login/logout.php">Sign out</a></li>
              </ul>
            </div>
            <!--UNTIL HERE-->
          </div>
        </div>
      </nav>
  </header>
    <main>
      <div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="profile.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy" width="700" height="500">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Welcome to my page!</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap,
          the world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
          responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
    </div>
  </div>
    </main>
  </body>
</html>
