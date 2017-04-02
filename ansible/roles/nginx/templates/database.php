<?php

// Create connection
$dbconn = pg_connect("host={{ db_ip }} , port=5432 , dbname={{ db_name }} , user={{ db_user }} , password={{ db_password }} ");

// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}
echo "Connected successfully";

$query = "SELECT * FROM compliments";

  $result = pg_query($query);
  if (!$result) {
      echo "Problem with query " . $query . "<br/>";
      echo pg_last_error();
      exit();
  }

  while($myrow = pg_fetch_assoc($result)) {
      printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $myrow['id'], htmlspecialchars($myrow['firstname']), htmlspecialchars($myrow['surname']), htmlspecialchars($myrow['emailaddress']));
  }



pg_close($dbconn);
?>
