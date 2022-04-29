<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "j811s905", "Wo7keeha",
"j811s905");

/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query = "SELECT * FROM Users;";

echo "
<table border='1'>
    <tr>
        <td><h3>user_id</h3></td>
    </tr>
";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
    $value = $row["user_id"];
    echo "<tr><td>$value</td></tr>";
    }
    echo "</table>";
    /* free result set */
    $result->free();
    }

/* close connection */
$mysqli->close();
 ?>
