<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="login_page_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $_SESSION['login_signup_display_style'] = "";
      $_SESSION['display_user_style'] = "";
      $email = ""; $pass = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = inputCleaner($_POST['email']);
        $pass = inputCleaner($_POST['pass']);

        $conn = new mysqli("localhost", "alejdnxu", "hFWucoCz1K26", "alejdnxu_portfolio");
        if ($conn->connect_error) {
          die("Connection failed: ".$conn->connect_error);
        } else {
          $sql = "SELECT Usuario_email, Usuario_clave FROM usuarios WHERE Usuario_email = '$email'";
          $results = $conn->query($sql);
          if ($results->num_rows == 1) {
            $db_pass = $results->fetch_row()[1];
            if (password_verify($pass, $db_pass)) {
              $_SESSION['login_signup_display_style'] = "none";
              $_SESSION['display_user'] = "Welcome, ".$email;
              $_SESSION['display_user_style'] = "block";
            } else {
              echo "Error, verifique su email o contraseña";
            }
          } else {
            echo "Error, verifique su email";
          }
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
        <div class="log_in-register" style="display:<?php echo $_SESSION['login_signup_display_style'];?>">
          <ul>
            <li id="detach"><a href="#">Log in</a></li>
            <li><a href="../form">Sign up</a></li>
          </ul>
        </div>
        <div class="log_in_display" style="display:<?php echo $_SESSION['display_user_style'];?>">
          <ul>
            <li id="detach"><?php echo $_SESSION['display_user']?></li>
            <li><a href="<?php session_destroy();?>">Log Out</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
      <fieldset>
        <div id="grid">
          <label for="email">Email: </label>
          <input type="email" name="email" value="<?php echo $email;?>">
        </div>
        <div id="grid">
          <label for="pass">Password: </label>
          <input type="password" name="pass" value="">
        </div>
        <input type="submit" name="login" value="Log in">
      </fieldset>
    </form>
  </body>
</html>
