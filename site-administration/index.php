<?php
  session_start();
  session_unset($_SESSION['successfullyRegistered']);

  if (!isset($_SESSION['session_email']) || $_SESSION['session_profile'] != 'admin')
    header('Location: ../');

  include '../login/connection.php';

  if(!isset($_GET['page'])) {
    $actualPage = 0;
  } else {
    $actualPage = $_GET['page'];
  }

  if (!isset($_SESSION['filter_email'])) {
    $_SESSION['filter_nif'] = ''; $_SESSION['filter_province'] = '';
    $_SESSION['filter_email'] = '';
  }

  $fields = array("(Usuario_nif LIKE '%". $_SESSION['filter_nif'] ."%')", "(Usuario_provincia LIKE '%". $_SESSION['filter_province'] ."%')", "(Usuario_email LIKE '%". $_SESSION['filter_email'] ."%')");
  $sql = 'SELECT * FROM usuarios WHERE '.implode(' AND ', $fields);
  $results = $conn->query($sql);
  $results_count = $results->num_rows;
  $num_pages = ceil($results_count / 4);

  $sql = 'SELECT * FROM usuarios WHERE '.implode(' AND ', $fields).' LIMIT '.($actualPage * 4).','. 4;
  $results = $conn->query($sql);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_SESSION['filter_nif'] = $_POST['nif']; $_SESSION['filter_province'] = $_POST['province'];
      $_SESSION['filter_email'] = $_POST['email'];

      $fields = array("(Usuario_nif LIKE '%". $_POST['nif'] ."%')", "(Usuario_provincia LIKE '%". $_POST['province'] ."%')", "(Usuario_email LIKE '%". $_POST['email'] ."%')");
      $sql = 'SELECT * FROM usuarios WHERE '.implode(' AND ', $fields);
      $results = $conn->query($sql);
      $results_count = $results->num_rows;
      $num_pages = ceil($results_count / 4);

      $sql = 'SELECT * FROM usuarios WHERE '.implode(' AND ', $fields).' LIMIT '.($actualPage * 4).','. 4;
      $results = $conn->query($sql);
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="../styles/styles.css" rel="stylesheet"/>
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
            <a id="list_item_" href="" class="">Welcome! <?php echo $_SESSION['session_email'] ?></a>
          </div>
          <div class="center_item">
            Site Administration
          </div>
        </div>
      </nav>
  </header>
    <main>
      <div class="main_container_admin">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
          <table style="width: 100%;text-align:center;">
            <tr>
              <td></td>
              <td>DNI</td>
              <td>Province</td>
              <td>Email</td>
            </tr>
            <tr>
              <td>Filter by:</td>
              <td><input type="text" name="nif" value="<?php echo $_SESSION['filter_nif']?>"/></td>
              <td><input type="text" name="province" value="<?php echo $_SESSION['filter_province']?>"/></td>
              <td><input type="text" name="email" value="<?php echo $_SESSION['filter_email']?>"/></td>
              <td><Button type="submit" value="Filter">Filter</button></td>
            </tr>
          </table>
        </form>
        <form action="delete.php" method="post">
          <table style="width: 100%;text-align:center;margin-top: 5rem;">
            <tr>
              <th></th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>DNI</th>
              <th>Province</th>
              <th>Email</th>
            </tr>
            <?php
              while($row = $results->fetch_row()) {
                echo "<tr>".
                  "<td><input type='checkbox' value='$row[0]' name='options[]'</td>".
                  "<td>".$row[1]."</td>".
                  "<td>".$row[2]."</td>".
                  "<td>".$row[17]."</td>".
                  "<td>".$row[15]."</td>".
                  "<td>".$row[7]."</td>".
                "</tr>";
              }
            ?>
          </table>
          <input  type="submit" value="Borrar"/>
        </form>
      </div>
    </main>
    <footer>
      <div class="list_pages" style="width:100%;">
        <li>
          <?php
            for ($x=1;$x<$num_pages+1;$x++){
              echo "<a href='http://localhost/site-administration/?page=".($x-1)."'>".($x)."</a>";
            }
          ?>
        </li>
      </div>
    </footer>
  </body>
</html>
