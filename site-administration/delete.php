<?php
  include '../login/connection.php';
  $options = $_POST['options'];
  echo print_r($options);
  foreach ($options as $opt) {
    $sql = "DELETE FROM usuarios WHERE Usuario_id = ".$opt.";";
    $results = $conn->query($sql);
  }
  header("Location: ./");
?>
