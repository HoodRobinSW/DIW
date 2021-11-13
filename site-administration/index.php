<?php
  session_start();
  session_unset($_SESSION['successfullyRegistered']);

  if (!isset($_SESSION['session_email']) || $_SESSION['session_profile'] != 'admin')
    header('Location: ../');

  include '../login/connection.php';
  $sql = 'SELECT * FROM usuarios';
  $results = $conn->query($sql);
  $results_count = $results->num_rows;
  $num_pages = ceil($results_count / 2);

  $sql = 'SELECT * FROM usuarios LIMIT '.($_GET['page']).','. 2;
  $results = $conn->query($sql);
  if(!isset($_GET['page'])) {
    $actualPage = 1;
  } else {
    $actualPage = $_GET['page'];
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
        <table style="width: 100%;text-align:center;">
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
          </tr>
          <?php
            while($row = $results->fetch_row()) {
              echo "<tr>".
                "<td><input type='checkbox' value='$row[0]'</td>"
                "<td>".$row[1]."</td>".
                "<td>".$row[2]."</td>".
                "<td>".$row[7]."</td>".
              "</tr>";
            }
          ?>
        </table>
      </div>
    </main>
    <footer>
      <div class="list_pages" style="width:100%;">
        <li>
          <?php
            for ($x=0;$x<$num_pages;$x++){
              echo "<a href='http://localhost/site-administration/?page=".($x+1)."'>".($x+1)."</a>";
            }
          ?>
        </li>
      </div>
    </footer>
  </body>
</html>
