<?php
  session_start();
  if (!isset($_SESSION['session_email'])) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="../bootstrap-5.1.2-dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../bootstrap-5.1.2-dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <title></title>
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
      $email = ""; $pass = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = inputCleaner($_POST['email']);
        $pass = inputCleaner($_POST['pass']);
        $conn = new mysqli("localhost", "alejdnxu", "hFWucoCz1K26", "alejdnxu_portfolio");
        if ($conn->connect_error) {
          die("Connection failed: ".$conn->connect_error);
        } else {
          $sql = "SELECT Usuario_clave, Usuario_bloqueado FROM usuarios WHERE Usuario_email = '$email'";
          $results = $conn->query($sql);
          if ($results->num_rows == 1) {

            $db_pass; $bloq;
            while ($row = $results->fetch_row()) {
              $db_pass = $row[0];
              $bloq = $row[1];
            }
            $results->free_result();

            if ($bloq == 0) {
              if (password_verify($pass, $db_pass)) {
                $_SESSION['login_signup_display_style'] = 'display: none;';
                $_SESSION['display_user'] = 'Welcome, '.$email;
                $_SESSION['session_email'] = $email;
                $_SESSION['display_user_style'] = 'display: block;';
                header('Location: ../');
              } else {
                echo "Error, verifique su email o contraseña";
              }
            } else {
              echo "Please verify your user before logging in";
            }
          } else {
            echo "Error, verifique su email";
          }
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
             <div id="login_signup_" style="<?php echo $_SESSION['login_signup_display_style'];?>">
               <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                 <li><a id="list_item_" class="nav-link px-2 link-dark" href="">Login</a></li>
                 <li><a id="list_item_" class="nav-link px-2 link-dark" href="../form/">Sign up</a></li>
               </ul>
             </div>
             <!--THIS TOGGLES WHEN THE USER LOGINS-->
             <div id="login_dropdown_" class="dropdown text-end" style="<?php echo $_SESSION['display_user_style'];?>">
               <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                 <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle" width="32" height="32">
               </a>
               <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                 <li><a class="dropdown-item" href="#">Settings</a></li>
                 <li><a class="dropdown-item" href="#">Profile</a></li>
                 <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
               </ul>
             </div>
             <!--UNTIL HERE-->
           </div>
         </div>
       </nav>
   </header>
    <main class="form-signin">
      <div id="login_form" class="text-center">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          <h1 class="h3 mb-3 fw-normal">Log in</h1>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $email;?>" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3" style="margin: 1rem 0;">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
      </div>
    </main>
  </body>
</html>
<?php
} else {
  header("Location: ../");
}
?>
