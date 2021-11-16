<?php
  session_start();
  if (!isset($_SESSION['session_email'])) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="../styles/styles.css" rel="stylesheet"/>
    <link rel="icon" href="../page-icon.png" type="image/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  </head>
  <body>
    <?php
      function inputCleaner($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $_SESSION['login_signup_display_style'] = "";
      $_SESSION['display_user_style'] = "";
      $verificationError = "";$errorSignIp_style = "";$errorSignIn = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = inputCleaner($_POST['email']);
        $pass = inputCleaner($_POST['pass']);
        include 'connection.php';

        $sql = "SELECT Usuario_clave, Usuario_bloqueado, Usuario_id, Usuario_perfil, Usuario_fotografia FROM usuarios WHERE Usuario_email = '$email'";
        $results = $conn->query($sql);
        if ($results->num_rows == 1) {

          $db_pass; $bloq;$user_Id;
          while ($row = $results->fetch_row()) {
            $db_pass = $row[0];
            $bloq = $row[1];
            $_SESSION['user_Id'] = $row[2];
            $user_profile = $row[3];
            $profile_image = $row[4];
          }
          $results->free_result();

          if ($bloq == 0) {
            if (password_verify($pass, $db_pass)) {
              $_SESSION['login_signup_display_style'] = 'display: none;';
              $_SESSION['display_user'] = 'Welcome, '.$email;
              $_SESSION['session_email'] = $email;
              $_SESSION['display_user_style'] = 'display: block;';
              $_SESSION['profile_image'] = $profile_image;
              $_SESSION['session_profile'] = $user_profile;
              if ($user_profile == 'admin') {
                header('Location: ../site-administration');
              } else {
                header('Location: ../');
              }
            } else {
              $errorSignIn = "Error, check your email or password";
            }
          } else {
            if (password_verify($pass, $db_pass)) {
              $verificationError = "visibility: visible";
            } else {
              $errorSignIn = "Error, check your email or password";
            }
          }
        } else {
          $errorSignIn = "Error, check your email or password";
        }

      }

      if (!empty($errorSignIn))
        $errorSignIp_style = 'display: block; opacity: 1;';
     ?>
     <header>
       <nav>
         <div id="navbar_" class="center_item">
           <div class="homeButton-container center_item_vertically">
             <a id="list_item_" href="../" class="">Home</a>
           </div>

           <!--THIS TOGGLES WHEN THE USER LOGINS; DISPLAY NONE;-->
           <div id="login_signup_" style='<?php echo $_SESSION['login_signup_display_style']; ?>'>
             <ul class="main-ul-container">
               <li><a id="list_item_" class="" href="">Login</a></li>
               <li><a id="list_item_" class="" href="../form/">Sign up</a></li>
             </ul>
           </div>
           <!--THIS TOGGLES WHEN THE USER LOGINS-->
           <div id="login_dropdown_" style="<?php echo $_SESSION['display_user_style']; ?>">
             <a href="#" class="profile_dropdown">
               <img src="<?php if (isset($_SESSION['profile_image'])) {
                 echo 'profile/uploads/' . $_SESSION['profile_image'];} else {echo 'images/profile-silhouette.png';}?>" width="32" height="32">
             </a>
             <ul class="userDropDown">
               <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
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
      <h2 class="signupFormHeader">Log in</h2>
      <!--Error Window-->
      <div class="signupError" style="<?php echo $errorSignIp_style ?>">
        <div>
          <?php echo $errorSignIn  ?>
        </div>

      </div>
      <!---->
      <div class="login_form">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          <div class="form_entry someSpace">
            <div class="center_form_entry">
              <div class="labeldiv">
                <label>Email address</label>
              </div>
              <div class="inputdiv">
                <input type="email" name="email" value="<?php echo $email;?>" placeholder="mail@example.com">
              </div>
            </div>
          </div>
          <div class="form_entry someSpace">
            <div class="center_form_entry">
              <div class="labeldiv">
                <label>Password</label>
              </div>
              <div class="inputdiv">
                <input type="password" name="pass" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="form_entry someSpace">
            <div class="center_form_entry">
              <div class="rememberdiv">
                <label for="rembember">Remember me</label>
              </div>
              <div class="remember_check">
                <input type="checkbox" name="remember" value="remember-me">
              </div>
            </div>
          </div>
          <div class="form_entry someSpace">
            <div class="center_form_entry">
              <div class="login_button_div">
                <button type="submit">Sign in</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--Modals-->
      <div class="modal center_item" role="dialog" id="modalChoice" style="<?php echo $verificationError;?>">
        <div class="modal-dialog center_item" role="document">
          <div>
            <h3 class="modal-title">Email verification required</h3>
            <p class="modal-text">We've already sent you a verification email, please check your inbox</p>
          </div>
          <div class="modal-footer">
            <button type="button" ><strong>Resend</strong></button>
            <button type="button" onclick="document.getElementById('modalChoice').style.visibility = 'hidden'">Close</button>
          </div>
        </div>
      </div>
      <!---->
    </main>
  </body>
</html>
<?php
} else {
  header("Location: ../");
}
?>
