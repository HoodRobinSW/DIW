<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form_style.css">
    <script type="text/javascript" src="passControl.js"></script>
    <title>Registro</title>
  </head>
  <body>
    <?php
      $email = ""; $pass1 = ""; $pass2 = ""; $birthDate = ""; $passErr = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = inputCleaner($_POST["email"]);
        $pass1 = inputCleaner($_POST["pass"]);
        $pass2 = inputCleaner($_POST["confirm_pass"]);
        $birthDate = inputCleaner($_POST["birthDate"]);

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
                $sql = "INSERT INTO usuarios(Usuario_email, Usuario_clave)
                VALUES ('$email', '$pass1')";
                if ($conn->query($sql)) {
                  echo "Registered successfully";
                } else {
                  echo "Error: ".$sql."<br/>".$conn->error;  
                }   
            }
            $conn->close();   
          }

        } else {
          $passErr = "Error, passwords do not match!";
        }
      }

      function inputCleaner($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
     ?>
    <header>
      <nav>

      </nav>
      <div class="title">
        <h1>Sign Up Form</h1>
      </div>
    </header>
    <main>
      <div class="form">
        <form id="form" class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          <fieldset>
            <!--<legend>Sign up: </legend>-->
            <div id="grid" class="email">
              <label for="email"><abbr title="*">*</abbr> Email: </label>
              <input id="email" type="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div id="grid" class="pass1">
              <label for="pass"><abbr title="*">*</abbr> Password: </label>
              <input id="pass" type="password" name="pass" value="" onkeyup="whenType()" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
              <div id="pass_strength_ok">
                <img src="ok-icon.png" alt="OK">
              </div>
              <div id="pass_stregth_cross">
                <img src="cross-icon.png" alt="insecure">
              </div>
            </div>
            <div class="grid" id="pass_error">
              <?php echo $passErr;?>
            </div>
            <div id="grid" class="pass2">
              <label for="confirm_pass"><abbr title="*">*</abbr> Password confirm: </label>
              <input id="confirm_pass" type="password" name="confirm_pass" value="" onkeyup="whenTypeConfirm()" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
              <div id="ok">
                <img src="ok-icon.png" alt="OK">
              </div>
              <div id="cross">
                <img src="cross-icon.png" alt="insecure">
              </div>
            </div>
            <div id="grid" class="birthDate">
              <label for="birthDate"><abbr title="*">*</abbr> BirthDate: </label>
              <input type="date" name="birthDate" value="<?php echo $birthDate; ?>" required>
            </div>
            <div class="save">
              <input type="submit" name="save" value="save" onsubmit="passInput()">
            </div>
          </fieldset>
        </form>
      </div>
    </main>
    <footer>
      <div id="error" class="pass_error">
        The value of the password input was not strong enough.
      </div id="error" class="email_error">
      <div>
          <?php echo $email_error?>
      </div>
    </footer>
  </body>
</html>
