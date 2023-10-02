<?php
require_once('connect.php');

$videoDir = '../videos/';
$videoFile = $videoDir . basename($_FILES['file']['name']);
$videoFileType = strtolower(pathinfo($videoFile,PATHINFO_EXTENSION));
$extensions_arr = array("mp4","avi","3gp","mov","mpeg", "wmv");
$vid = $_POST["videoCourse"];

if(isset($_POST['submit'])){
   if(!file_exists($videoFile)){
       if($_FILES['file']['size'] < 314572800){
           if(in_array($videoFileType, $extensions_arr)){
               if (move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/videos/'. basename($_FILES['file']['name']))) {
                   echo "The video ". htmlspecialchars( basename( $_FILES['file']['name'])). " has been uploaded.";
                   mysqli_query($conn, "INSERT INTO ace_videos (video_name, video_course) VALUES ('".basename($_FILES['file']['name'])."', '{$vid}')");
                 } else {
                   echo "Sorry, there was an error uploading your video.";
                 }
           } else {
               echo 'Wrong file type';
           }
       } else {
           echo 'Video size is too large';
       }
   } else {
       echo 'Video already exists';
   }
}
?>