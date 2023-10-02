<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$_SESSION['currentDir'] = basename(__DIR__);

require_once("../../functions/connect.php");

require_once("../../functions/redirect.php");
?>
<!doctype html> 
<html> 
  <head>
     <title>Ace Videos Upload</title>
     <link rel="stylesheet" type="text/css" href="../../style/style.css">
  </head>
  <body>
  <header>
    <?php include("../../include/header.php") ?>
  </header>
    <form method="post" id="video-upload-form" action="../../functions/video_up_routine.php" enctype="multipart/form-data" style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
      <label for="videoCourse">Select Course:</label>
      <select id="videoCourse" name="videoCourse" form="video-upload-form">
          <?php
            $sql = mysqli_query($conn, "SELECT course FROM ace_courses");
            while($result = mysqli_fetch_assoc($sql)){
                echo "<option value=".$result['course'].">".$result['course']."</option>";
            }
          ?>
      </select>
      <input type="file" name="file" id="file">
      <input type="submit" value="Upload" name="submit">
    </form>
    <footer>
      <?php include("../../include/footer.php")?>
  </footer>
  </body>
</html>