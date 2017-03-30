<?php
 
// Create connection
$dbconn = pg_connect("host={{ db_ip }} , port=5432 , dbname=dbadmin , user=dbadmin , password={{ db_password }} ");

// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}
echo "Connected successfully";
pg_close($dbconn);
?>
