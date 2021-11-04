<?php
  session_start();

  if (isset($_SESSION['session_email'])) {
    include "login/connection.php";
    $sessionEmail = $_SESSION['session_email'];
    $sql = "SELECT Usuario_fotografia FROM usuarios WHERE Usuario_email = '$sessionEmail'";
    $result = $conn->query($sql);
    $_SESSION['profile_image'] = $result->fetch_row()[0];
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="bootstrap-5.1.2-dist/css/styles.css" rel="stylesheet"/>
    <link rel="icon" href="page-icon.png" type="image/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Ortega</title>
  </head>
  <body>
    <header>
      <nav>
        <div id="navbar_" class="center_item">
          <div class="homeButton-container center_item_vertically">
            <a id="list_item_" href="" class="">Home</a>
          </div>

          <!--THIS TOGGLES WHEN THE USER LOGINS; DISPLAY NONE;-->
          <div id="login_signup_" style='<?php echo $_SESSION['login_signup_display_style']; ?>'>
            <ul class="main-ul-container">
              <li><a id="list_item_" class="" href="login/">Login</a></li>
              <li><a id="list_item_" class="" href="form/">Sign up</a></li>
            </ul>
          </div>
          <!--THIS TOGGLES WHEN THE USER LOGINS-->
          <div id="login_dropdown_" class="dropdown text-end" style="<?php echo $_SESSION['display_user_style']; ?>">
            <a href="#" class="" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php if (isset($_SESSION['profile_image'])) {
                echo 'profile/uploads/' . $_SESSION['profile_image'];} else {echo 'images/profile-silhouette.png';}?>" width="32" height="32">
            </a>
            <ul class="userDropDown" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="profile">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="login/logout.php">Sign out</a></li>
            </ul>
          </div>
          <!--UNTIL HERE-->
        </div>

      </nav>
  </header>
    <main>
      <div class="main_container">
        <div id="frontPage_image">
          <img src="profile.png" alt="Alejandro Ortega Guerra" loading="lazy" width="300" height="300">
        </div>
        <div id="frontPage_text">
          <h1>Welcome to my page!</h1>
          <p class="center_item_vertically">Quickly design and customize responsive mobile-first sites with Bootstrap,
            the world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
            responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        </div>
      </div>
    </main>
  </body>
</html>
