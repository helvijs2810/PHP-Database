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
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <link rel="stylesheet" type="text/css" href="../../style/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<header>
    <?php include("../../include/header.php") ?>
</header>
<body >
<form id="quiz-upload-form" action="../../functions/quiz_up_routine.php" method="post" enctype="multipart/form-data">
  <table style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
    <tr>
      <th>Quiz Topic</th>
      <th>File Upload</th>
      <th>Deadline Date</th>
    </tr>
    <tr>
      <td>
        <select id="quizTopic" name="quizTopic" form="quiz-upload-form">
          <?php
            $userCourse = 'Physics';
            $sql = mysqli_query($conn, "SELECT * FROM ace_courses");
            while($result = mysqli_fetch_assoc($sql)){
              $moduleList = explode(",",$result['course_modules']);
              foreach($moduleList as $value){
                  echo "<option value=".$value.">".$result['course']."-".$value."</option>";
              }
            }
          ?>
        </select>
      </td>
      <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
      <td><input type="date" name="quizDeadline" id="quizDeadline"></td>
    </tr>
    <tr>
      <td><input type="submit" value="Upload file" name="submit"></td>
    </tr>
  </table>
</form>
<script>
        $(document).ready(function() {
            jQuery.validator.addMethod("fileupload", function(value, element) {
                return $("#file").val() === '';
            }, "Please upload file");

            $("#quiz-upload-form").validate({
            rules: {
                quizTopic : {
                required: true
                },
                quizDeadline : {
                minlength: 3,
                required: true
                },
                quizDeadline : {
                required: true,
                date: true
                },
                fileToUpload : {
                required: true
            }
        }
    });
    });
</script>
<footer>
    <?php include("../../include/footer.php")?>
</footer>
</body>
</html>