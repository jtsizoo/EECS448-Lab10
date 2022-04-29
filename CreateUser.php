<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "j811s905", "Wo7keeha",
"j811s905");

$user = $_POST["user"];
$validUser = true;

/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$search = "SELECT user_id FROM Users;";

if ($result = $mysqli->query($search)) {

  while ($row = $result->fetch_assoc()) {
      $value = $row["user_id"];
      if($user == $value)
      {
          echo "<h1> Error - User already exists in the table!</h2>";
          $validUser = false;
      }
  }

  if($validUser != false)
  {
    $query = "INSERT INTO Users (user_id) VALUES ('$user');";
    $result = $mysqli->query($query);
    echo "<h1> $user successfully inserted into table </h2>";
  }

  $result->free();
}

/* close connection */
$mysqli->close();
 ?>
