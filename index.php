<?php
  session_start();

  if (isset($_SESSION['successfullyRegistered'])) {
    $registered_info_style = 'display: block;';
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="styles/styles.css" rel="stylesheet"/>
    <link rel="icon" href="page-icon.png" type="image/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Ortega</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WWFV77Y34P"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-WWFV77Y34P');
    </script>    
  </head>
  <body>
    <header>
      <nav>
        <div id="navbar_" class="center_item">
          <div class="homeButton-container center_item_vertically">
            <a id="list_item_" href="" class="">Home</a>
            <a style="margin-left:4rem;" id="list_item_" href="map">About Me</a>
          </div>

          <!--THIS TOGGLES WHEN THE USER LOGINS; DISPLAY NONE;-->
          <div id="login_signup_" style='<?php echo $_SESSION['login_signup_display_style']; ?>'>
            <ul class="main-ul-container">
              <li><a id="list_item_" class="" href="login/">Login</a></li>
              <li><a id="list_item_" class="" href="form/">Sign up</a></li>
            </ul>
          </div>
          <!--THIS TOGGLES WHEN THE USER LOGINS-->
          <div id="login_dropdown_" style="<?php echo $_SESSION['display_user_style']; ?>">
            <a href="" class="">
              <img src="<?php if (isset($_SESSION['profile_image'])) {
                echo 'profile/uploads/' . $_SESSION['profile_image'];} else {echo 'images/profile-silhouette.png';}?>" width="32" height="32">
            </a>
            <ul class="userDropDown">
              <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
              <li><a class="dropdown-item" href="profile">Profile</a></li>
              <li><hr></li>
              <li><a class="dropdown-item" href="login/logout.php">Sign out</a></li>
            </ul>
          </div>
          <!--UNTIL HERE-->
        </div>

      </nav>

  </header>
    <main>
      <!--INFO CONTAINER-->
      <div class="info_div" style="<?php echo $registered_info_style; ?>">
        <div>
          <?php echo $_SESSION['successfullyRegistered']; ?>
        </div>
      </div>
      <!---->
      <div class="main_container">
        <div id="frontPage_text">
          <h1 style="text-align: center;">Welcome to my page!</h1>
          <p>Hello! Im Alejandro, and I'm a web developer!</p>
        </div>
        <div id="frontPage_image">
          <img src="profile.png" alt="Alejandro Ortega Guerra" loading="lazy" width="300" height="300">
        </div>
      </div>
    </main>
  </body>
</html>
