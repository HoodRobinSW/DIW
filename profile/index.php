<?php
  session_start();

  if (isset($_SESSION['session_email'])) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="../styles/styles.css" rel="stylesheet"/>
    <script type="text/javascript">
      const onLoadProfilePage = () => {
        document.querySelector('.profileSettings').style.background = '#C1C1C1';

      }
    </script>
    <script type="text/javascript" src="profile.js"></script>
  </head>
  <body onload="onLoadProfilePage()">
    <header>
      <nav>
        <div id="navbar_" class="center_item">
          <div class="homeButton-container center_item_vertically">
            <a id="list_item_" href="../" class="">Home</a>
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
                echo 'profile/uploads/' . $_SESSION['profile_image'];} else {echo '../images/profile-silhouette.png';}?>" width="32" height="32">
            </a>
            <ul class="userDropDown">
              <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
              <li><a class="dropdown-item" href="">Profile</a></li>
              <li><hr></li>
              <li><a class="dropdown-item" href="../login/logout.php">Sign out</a></li>
            </ul>
          </div>
          <!--UNTIL HERE-->
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
