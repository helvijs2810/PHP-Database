<?php 
session_start();
require_once("connect.php");
$user = $_SESSION['userName'];
$courseEnroll = implode(",", $_POST['courseEnroll']);
$sql = mysqli_query($conn, "SELECT * FROM ace_users WHERE user_name='".$_SESSION['userName']."'");
if(! $sql ) {
    die('Could not get data');
 }
while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
    if($row['user_name'] == $_SESSION['userName']){
        $type = $row['user_type'];
    }
}
mysqli_query($conn, "INSERT INTO user_courses (user_name, user_type, course, completed_modules, course_authorised) VALUES ('$user', '$type' , '$courseEnroll', '' ,'False')");
?>