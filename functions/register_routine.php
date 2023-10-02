<?php
require_once("connect.php"); 

//Get all data from registration form while protecting against SQL injection
$forename = $conn -> real_escape_string($_POST['forename']); 
$surname = $conn -> real_escape_string($_POST['surname']); 
//Username is built on forename, surname and date of registration
$username = substr($forename, 0, 1) . $surname . date("Ydm");
$passwd = $conn -> real_escape_string($_POST['password']); 
$email = $conn -> real_escape_string($_POST['email']); 
$gender = $conn -> real_escape_string($_POST['gender']); 
$user_type = $conn -> real_escape_string($_POST['type']);

//If not admin, flag for authorisation on registration is set to false
if($user_type == "admin"){
   $authFlag = "True";
} else {
   $authFlag = "False";
}

//Query to see if duplicate exists in database, otherwise add to database
$query = mysqli_query($conn, "SELECT * FROM ace_users WHERE forename='{$forename}' AND surname='{$surname}'");
if (mysqli_num_rows($query) == 1){
  echo "Duplicate account";
}
else {
   mysqli_query($conn, "INSERT IGNORE INTO ace_users (forename, surname, user_name, user_pass, email, gender, user_type, user_authorised)VALUES (
      '{$forename}', '{$surname}', '{$username}', '".md5($passwd)."', '{$email}', '{$gender}' , '{$user_type}', '{$authFlag}'
   )");
}

mysqli_close($conn);

echo "Your username is " .$username. ". You will be redirected to login page in 10s.";
header("refresh:10; url=../login.php");
?>