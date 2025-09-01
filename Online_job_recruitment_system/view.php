<?php
  include "php/config.php";

  //if ($connection->connect_error) {
    // die("Connection failed: " . $connect->connect_error);
  //}

  $sql = "SELECT file_name, file_data FROM candidates ";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    $row = $result->fetch_assoc();
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $row['file_name'] . '"');
    echo $row['file_data'];}
  } else {
    echo "PDF file not found.";
  }
?>

