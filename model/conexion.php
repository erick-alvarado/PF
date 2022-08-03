
<?php
// Database configuration
$host  = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "prueba";
 
// Create database connection
$bd = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  
// Check connection
if (!$bd) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
?>