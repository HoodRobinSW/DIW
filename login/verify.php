<?php
  if (isset($_GET['t']) && isset($_GET['user'])) {
    $token = trim($_GET['t']);
    $user = trim($_GET['user']);

    $conn = new mysqli("localhost", "alejdnxu", "hFWucoCz1K26", "alejdnxu_portfolio");
    if ($conn->connect_error)
      die("Connection failed: ".$conn->connect_error);
    $sql = "SELECT COUNT(*) FROM usuarios WHERE Usuario_id = '$user' AND Usuario_token_aleatorio = '$token'";
    $results = $conn->query($sql);
    if ($results->num_rows == 1) {
      $sql = "UPDATE usuarios SET Usuario_bloqueado = 0 WHERE Usuario_id = '$user'";
      if ($conn->query($sql)) {
        header("Location: ./");
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }

  }
?>
