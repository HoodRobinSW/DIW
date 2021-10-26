<?php
  session_start();

  if (isset($_SESSION['session_email'])) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="../bootstrap-5.1.2-dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      const onLoadProfilePage = () => {
        document.querySelector('.profileSettings').style.background = '#C1C1C1';

      }
    </script>
    <script type="text/javascript" src="profile.js"></script>
  </head>
  <body onload="onLoadProfilePage()">
    <header class="p-3 mb-3 border-bottom">
      <nav id="navbar_bg" class="navbar navbar-expand-md navbar-dark fixed-top ">
        <div class="container-fluid">
          <div id="navbar_" class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a id="list_item_" href="../" class="nav-link px-2 link-dark">Home</a></li>
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
                <img src="<?php if (isset($_SESSION['profile_image'])) {
                  echo 'uploads/' . $_SESSION['profile_image'];} else {echo '../images/profile-silhouette.png';}?>" alt="mdo" class="rounded-circle" width="32" height="32">
              </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../login/logout.php">Sign out</a></li>
              </ul>
            </div>
            <!--UNTIL HERE-->
          </div>
        </div>
      </nav>
  </header>
  <main>
    <div class="profileTableContainer">
      <div class="profileOptionsContainer">
        <div class="profileOption profileSettings" id="option1" onclick="optionFocusProfile(this)">
          Profile
        </div>
        <div class="profileOption" id="option2" onclick="optionFocusThemes(this)">
          Themes
        </div>
      </div>
      <div class="profileDataContainer">
        <div class="centeredImage">
          <div class="imageBlock">
            <img src="<?php if (isset($_SESSION['profile_image'])) {
              echo 'uploads/' . $_SESSION['profile_image'];} else {echo '../images/profile-silhouette.png';}?>"
              class="rounded-circle" id="profileImage" width="200" height="200">
            <a href="#" onclick="fileUpload()" method="post" class="editPhoto">
              <img class="rounded-circle" src="../images/edit.png" width="50" height="50">
            </a>
          </div>
        </div>
        <div class="sessionEmail">
          <i><?php echo $_SESSION['session_email']; ?></i>
        </div>
        <form action="editProfilePhoto.php" method="post" enctype="multipart/form-data">
          <input type="file" onchange="loadFile(event)" id="fileUpload" name="imageUpload" hidden>
          <input id="save" type="submit" name="submit" value="Save">
        </form>
      </div>
    </div>
  </main>
  <footer></footer>
  </body>
</html>
<?php
} else {
  header("Location: ../");
}
?>
