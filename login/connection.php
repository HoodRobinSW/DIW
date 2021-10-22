<?php
  $conn = new mysqli("localhost", "alejdnxu", "hFWucoCz1K26", "alejdnxu_portfolio");
  if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
  }
?>
