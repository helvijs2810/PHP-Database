<?php
session_start();
require_once("connect.php"); 

$uploadDir = '../uploads/';
$targetFile = $uploadDir . basename($_FILES['fileToUpload']['name']);
$targetFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
$fileLocation = $_SERVER['DOCUMENT_ROOT'].'/quizes/'. basename($_FILES['fileToUpload']['name']);

$quizTopic = $_POST['quizTopic']; 
$quizExpiry = $_POST['quizDeadline'];

if(isset($_POST['submit'])){
    if(!file_exists($targetFile)){
        if($_FILES['fileToUpload']['size'] < 2097152){
            if($targetFileType == 'csv'){
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/quizes/'. basename($_FILES['fileToUpload']['name']))) {
                    echo "The file ". htmlspecialchars( basename( $_FILES['fileToUpload']['name'])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
            } else {
                echo 'Wrong file type';
            }
        } else {
            echo 'File size is too large';
        }
    } else {
        echo 'File already exists';
    }
}

$userCourse = "Physics";

echo $quizTopic;
mysqli_query($conn, "INSERT INTO ace_quiz (quiz_topic, quiz_course, f_name, quiz_expiry, score) VALUES ('$quizTopic', '$userCourse', '".basename($_FILES['fileToUpload']['name'])."', '$quizExpiry', '')");
?>