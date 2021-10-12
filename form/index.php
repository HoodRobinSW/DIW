<?php
  session_start();
  if (isset($_SESSION['session_email']))
    header('Location: ../');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../bootstrap-5.1.2-dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
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
      $email = ""; $pass1 = ""; $pass2 = ""; $date = ""; $passErr = ""; $email_error = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = inputCleaner($_POST["email"]);
        $pass1 = inputCleaner($_POST["pass1"]);
        $pass2 = inputCleaner($_POST["pass2"]);
        $date = inputCleaner($_POST["date"]);

        if ($pass1 == $pass2) {
          $conn = new mysqli("localhost", "alejdnxu", "hFWucoCz1K26", "alejdnxu_portfolio");
          if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
          } else {
              $sql = "SELECT Usuario_email FROM usuarios WHERE Usuario_email = '$email'";
              $results = $conn->query($sql);
              if (($results->num_rows) > 0) {
                $email_error = "There is already an account with this email";
              } else {
                $hash_pass = password_hash($pass1, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios(Usuario_email, Usuario_clave)
                VALUES ('$email', '$hash_pass')";
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
          $passErr = 'Error, passwords do not match!';
        }
      }
     ?>
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
             <div style="display:block;">
               <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                 <li><a id="list_item_" class="nav-link px-2 link-dark" href="../login/">Login</a></li>
                 <li><a id="list_item_" class="nav-link px-2 link-dark" href="#">Sign up</a></li>
               </ul>
             </div>
             <!--THIS TOGGLES WHEN THE USER LOGINS-->
             <div class="dropdown text-end" style="display:none;">
               <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                 <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle" width="32" height="32">
               </a>
               <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                 <li><a class="dropdown-item" href="#">Settings</a></li>
                 <li><a class="dropdown-item" href="#">Profile</a></li>
                 <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item" href="#">Sign out</a></li>
               </ul>
             </div>
             <!--UNTIL HERE-->
           </div>
         </div>
       </nav>
     </header>
    <main>
      <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" oninput='pass2.setCustomValidity(pass2.value != pass.value ? "Passwords do not match." : "")'>
          <div class="form-group row">
            <!--<label for="inputEmail3" class="col-sm-2 col-form-label">Email: </label>-->
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <!--<label for="inputPassword3" class="col-sm-2 col-form-label">Password: </label>-->
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass1"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            </div>
          </div>
          <div class="form-group row">
            <!--<label for="inputPassword3" class="col-sm-2 col-form-label"></label>-->
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="pass2" placeholder="Re-type Password" required>
            </div>
          </div>
          <div class="form-group row">
            <!--<label for="inputDate" class="col-sm-2 col-form-label"></label>-->
            <div class="col-sm-10">
              <input type="date" class="form-control" id="inputDate" name="date" value="<?php echo $birthDate; ?>" required>
            </div>
          </div>
          <!--
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  <label class="form-check-label" for="gridRadios1">
                    First radio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  <label class="form-check-label" for="gridRadios2">
                    Second radio
                  </label>
                </div>
                <div class="form-check disabled">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                  <label class="form-check-label" for="gridRadios3">
                    Third disabled radio
                  </label>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-group row">
            <div class="col-sm-2">Checkbox</div>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Example checkbox
                </label>
              </div>
            </div>
          </div>-->
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
          </div>
        </form>
      </div>
    </main>
    <footer>
      <div id="error" class="pass_error" style="display:none;">
        The value of the password input was not strong enough.
      </div id="error" class="email_error">
      <div>
          <?php echo $email_error?>
      </div>
    </footer>
  </body>
</html>
