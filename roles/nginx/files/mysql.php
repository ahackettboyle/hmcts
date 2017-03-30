<?php
$servername = "mysql1";
$username = "wordpressuser";
$password = "secret";

// Create connection
$dbconn = pg_connect("host=10.0.1.121 , port=5432 , dbname=dbadmin , user=dbadmin , password={{ password}} ");

// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}
echo "Connected successfully";
pg_close($dbconn);
?>
