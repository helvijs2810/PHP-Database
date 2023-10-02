<?php

//Run session if one does not exist
if(session_status() == PHP_SESSION_NONE) 
    { 
        session_start(); 
    } 
require_once("connect.php"); 

//Pull information from form
$username = $_POST["username"];
$password = $conn -> real_escape_string($_POST["pass"]);
$hashedpass = md5($password);

//Get info for user trying to log in
$sql = "SELECT * FROM ace_users WHERE user_name='{$username}'";

$query = mysqli_query($conn, $sql);

//If credentials valid, create a token to confirm successful login + store user type of person
if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_array($query);
    $data_pass = $row["user_pass"];

    if($data_pass == $hashedpass){
        if($row["user_authorised"] == "True"){
            $_SESSION['token'] = password_hash(session_id(), PASSWORD_DEFAULT);
            $sql = mysqli_query($conn, "SELECT * FROM ace_users WHERE user_name='{$username}'");
            $row = mysqli_fetch_array($sql);
            $_SESSION['userType'] = $row['user_type'];
            $_SESSION['userName'] = $row['user_name'];

            echo json_encode(['token' => "${_SESSION['token']}"]);
            
        } else {
            echo json_encode(['error' => 'Account has not been verified yet']);
        }
    } else {
        echo json_encode(['error' => 'Wrong Password']);
    }
} else {
    echo json_encode(['error' => 'User does not exist']);
}

mysqli_close($conn);

?>