<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="../styles/styles.css" rel="stylesheet"/>
    <link rel="icon" href="page-icon.png" type="image/gif">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="map.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alejandro Ortega</title>
    <style media="screen">
      #map {
        margin-top: 4rem;
        height: 20rem;
      }

    </style>
  </head>
  <body>
    <header>
      <nav>
        <div id="navbar_" class="center_item">
          <div class="homeButton-container center_item_vertically">
            <a id="list_item_" href="../" class="">Home</a>
            <a style="margin-left:4rem;" id="list_item_" href="">About Me</a>
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
      <div id="map"></div>

      <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCKwW88O7jV36kp0sUbK4g8Q0Luiqc9co&callback=initMap&v=weekly"
        async
      ></script>
    </main>
  </body>
</html>
