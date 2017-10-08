<?php
  $db = mysqli_connect("localhost","betwin","","betwin_db");
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
