
<?php
// Database configuration
$host  = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "prueba";
 
// Create database connection
$bd = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  
// Check connection
if(mysqli_connect_error())
{
 echo "Connection establishing failed!";
}
else
{
 echo "Connection established successfully.";
}
?>