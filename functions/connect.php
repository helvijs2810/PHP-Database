<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
// making a connection to database
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = "ace_training";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect My Sql:');
}
?>