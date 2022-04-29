<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "j811s905", "Wo7keeha",
  "j811s905");
  /* check connection */
  if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
  }

if(isset($_POST['delete'])) {
  foreach($_POST['delete'] as $id)
  {
    $query = "DELETE FROM Posts WHERE post_id = '$id';"; 
    $result = $mysqli->query($query);
    echo "<h2>Post with the id of: $id has been removed!<br><br>";
    }
  }
      /* close connection */

$mysqli->close();

 ?>
