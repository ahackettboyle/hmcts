<?php

// Create connection
$dbconn = pg_connect("host={{ db_ip }} , port=5432 , dbname={{ db_name }} , user={{ db_user }} , password={{ db_password }} ");

// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}
echo "Connected successfully";

$query = "SELECT * FROM compliments";

  $result = pg_query($dbconn, $query);
  if (!$result) {
      echo "Problem with query " . $query . "<br/>";
      echo pg_last_error();
      exit();
  }

  while($row = pg_fetch_row($result)) {
      echo "Compliment number $row[0]: $row[1] "



pg_close($dbconn);
?>
