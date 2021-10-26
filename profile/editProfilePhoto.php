<?php
  session_start();

  $target_file = "uploads/" . basename($_FILES["imageUpload"]["name"]);
  $uploadOk = 0;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if ($_FILES["imageUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        include '../login/connection.php';
        $fileName = $_FILES['imageUpload']['name'];
        $emailSession = $_SESSION['session_email'];
        $sql = "UPDATE usuarios SET Usuario_fotografia = '$fileName' WHERE Usuario_email = '$emailSession'";
        $conn->query($sql);
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }

  header("Location: ../");
?>
