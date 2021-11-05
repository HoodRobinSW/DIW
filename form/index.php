<?php
  session_start();
  if (isset($_SESSION['session_email']))
    header('Location: ../');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../styles/styles.css" rel="stylesheet"/>
    <script type="text/javascript" src="passControl.js"></script>
    <title>Registro</title>
  </head>
  <body>
    <?php
      function inputCleaner($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $email = ""; $pass1 = ""; $pass2 = ""; $date = ""; $errors = [];
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = inputCleaner($_POST["email"]);
        $pass1 = inputCleaner($_POST["pass1"]);
        $pass2 = inputCleaner($_POST["pass2"]);
        $date = inputCleaner($_POST["date"]);
        $username = inputCleaner($_POST["username"]);

        if ($pass1 == $pass2) {
          $conn = new mysqli("localhost", "alejdnxu", "hFWucoCz1K26", "alejdnxu_portfolio");
          if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
          } else {
              $sql = "SELECT Usuario_email FROM usuarios WHERE Usuario_email = '$email'";
              $resultQueryEmail = $conn->query($sql);
              $sql = "SELECT Usuario_nick FROM usuarios WHERE Usuario_nick = '$username'";
              $resultQueryNick = $conn->query($sql);
              if (($resultQueryEmail->num_rows) > 0) {
                $errors[] = "There is already an account with this email";
              } else if(($resultQueryNick->num_rows) > 0) {
                $errors[] = "This nick is taken";
              } else {
                $hash_pass = password_hash($pass1, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios(Usuario_email, Usuario_clave, Usuario_nick)
                VALUES ('$email', '$hash_pass', '$username')";
                if ($conn->query($sql)) {
                  $sql = "SELECT Usuario_id FROM usuarios WHERE Usuario_email = '$email'";
                  $results = $conn->query($sql);
                  $user_id = $results->fetch_row()[0];
                  $verification_token = bin2hex(openssl_random_pseudo_bytes(16));
                  $sql = "UPDATE usuarios SET Usuario_token_aleatorio = '$verification_token' WHERE Usuario_email = '$email'";
                  $conn->query($sql);
                  echo 'Registered successfully';
                  include 'welcome_email.php';
                  /*--Generating a verification token--*/
                  $verification_url = "https://www.alejandroortegaguerra.me/login/verify.php?t=$verification_token&user=$user_id";
                  $link = "<a href='".$verification_url."'>".$verification_url."</a>";
                  $message_eng .= $link;
                  mail($email, $subject, $message_eng);
                  /*INTRODUCING THE TOKEN WITHIN THE DATABASE*/
                } else {
                  echo 'Error: '.$sql.'<br/>'.$conn->error;
                }
            }
            $conn->close();
          }

        } else {
          $errorSignUp = 'Error, passwords do not match!';
        }
      }

      if (!empty($errors))
        $errorSignUp_style = 'display: block; opacity: 1;';
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
               <li><a id="list_item_" class="" href="../login">Login</a></li>
               <li><a id="list_item_" class="" href="">Sign up</a></li>
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
      <div class="signupFormHeader">
        <h2>Sign up Form</h2>
      </div>
      <!--PASSWORD OR EMAIL ERROR-->
      <div class="signupError" style="<?php echo $errorSignUp_style ?>">
        <?php foreach ($errors as $error) {
          echo $error."<br/>";
        }  ?>
      </div>
      <!---->
      <div class="signup_form">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" oninput='pass2.setCustomValidity(pass2.value != pass.value ? "Passwords do not match." : "")'>
          <div class="form_entry">
            <div class="signup_input">
              <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
          </div>
          <div class="form_entry">
            <div class="signup_input">
              <input type="text" placeholder="Username" name="username" required>
            </div>
          </div class="signup_input">
          <div class="form_entry">
            <div class="signup_input">
              <input type="password" placeholder="Password" name="pass1"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            </div>
          </div>
          <div class="form_entry">
            <div class="signup_input">
              <input type="password" name="pass2" placeholder="Re-type Password" required>
            </div>
          </div>
          <div class="form_entry">
            <div class="signup_input">
              <input type="date" name="date" value="<?php echo $birthDate; ?>" required>
            </div>
          </div>
          <div class="form_entry">
            <div class="signup_input">
              <button type="submit">Sign up</button>
            </div>
          </div>
        </form>
      </div>
    </main>
    <footer>

    </footer>
  </body>
</html>
