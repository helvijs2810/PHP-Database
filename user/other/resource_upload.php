<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$_SESSION['currentDir'] = basename(__DIR__);

require_once("../../functions/connect.php");

require_once("../../functions/redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../../style/style.css">
</head>
<body>
<header>
    <?php include("../../include/header.php") ?>
</header>
<form id="file-upload-form" action="../../functions/resource_up_routine.php" method="post" enctype="multipart/form-data" style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
  <label for="fileCourse">Select Course:</label>
    <select id="fileCourse" name="fileCourse" form="file-upload-form">
        <?php
          $sql = mysqli_query($conn, "SELECT course FROM ace_courses");
          while($result = mysqli_fetch_assoc($sql)){
              echo "<option value=".$result['course'].">".$result['course']."</option>";
          }
        ?>
    </select>
  <label for="myFile">Select a resource to upload:</label>
  <input type="file" name="myFile" id="myFile">
  <label for="fileStart">Select start date for availability:</label>
  <input type="date" name="fileStart" id="fileStart">
  <label for="fileEnd">Select end date for availability:</label>
  <input type="date" name="fileEnd" id="fileEnd">
  <input type="submit" value="Upload file" name="submit">
</form>
<footer>
    <?php include("../../include/footer.php")?>
</footer>
</body>
</html>