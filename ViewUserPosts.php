<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "j811s905", "Wo7keeha",
"j811s905");

/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$user = $_POST["users"];

$query = "SELECT * FROM Posts WHERE author_id = '$user';";

echo "
<table border='1'>
    <tr>
        <td><h3>post_id</h3></td>
        <td><h3>content</h3></td>
        <td><h3>author_id</h3></td>
    </tr>
";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
    $value = $row["post_id"];
    $value1 = $row["content"];
    $value2 = $row["author_id"];
    echo "<tr><td>$value</td>";
    echo "<td>$value1</td>";
    echo "<td>$value2</td></tr>";
    }
    echo "</table>";
    /* free result set */
    $result->free();
    }

/* close connection */
$mysqli->close();

?>
