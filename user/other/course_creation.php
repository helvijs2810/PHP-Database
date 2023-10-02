<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$_SESSION['currentDir'] = basename(__DIR__);

require_once("../../functions/connect.php");

require_once("../../functions/redirect.php");
?>
<html>
<head>
    <title>Course Creation</title>
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<header>
    <?php include("../../include/header.php") ?>
</header>
<body>
    <form id="course-form" class="course-form" action="../../functions/course_addition.php" method="POST">
        <table border=5 align=center bordercolor="#15223d">
            <tr>
                <td><label for="course_name">Course Name</label></td>
                <td><input type="text" name="course_name" value="" /></td>
            </tr>
            <tr>
                <td><label for="course_desc">Course Description</label></td>
                <td><textarea rows="4" cols="50" name="course_desc"></textarea></td>
            </tr>
            <tr>
                <td><label for="course_modules">Course Modules</label></td>
                <td><textarea rows="5" cols="50" name="course_modules"></textarea></td>
            </tr>
            <tr>
                <td colspan=2 align="center">
                    <input type="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
    <div id="error">
    </div>
    <script>
        $(document).ready(function() {
            $("#course-form").validate({
            rules: {
                course_name : {
                required: true,
                minlength: 3,
                },
                course_desc : {
                minlength: 3,
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