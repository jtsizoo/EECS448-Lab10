<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "j811s905", "Wo7keeha",
"j811s905");

$user = $_POST["user"];
$validUser = false;
$post = $_POST["post"];

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
            $validUser = true;
            break;
      }
  }
}

if($validUser != true)
{
  echo "<h1> Error - Post was not written by an existing user!</h1>";
}
else
{
  $query = "INSERT INTO Posts (content, author_id) VALUES ('$post', '$user');";
  $result = $mysqli->query($query);
  echo "<h1> $user successfully inserted the following post: </h2><h3>$post</h3>";
}

$result->free();

/* close connection */
$mysqli->close();
 ?>
