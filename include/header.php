<html>
<head>
<style type="text/css">
*{
  font-family:verdana;
}
.header {
  
  text-align: left;
  background: #15223d;
  color: white;
  font-size: 20px;
  text-decoration: bold;
  float: left; 
}
.vertical-menu {
  width: 200px;
  background: #15223d;
 /* Set a width if you like */
}

.vertical-menu a {
  background-color: #15223d; /* Grey background color */
  color: white; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}
a:link {
  color: lightgrey;
  background-color: transparent;
  text-decoration: none;
}

a:visited {
  color: darkgrey;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: grey;
  background-color: transparent;
  text-decoration: underline;
}
</style>
</head>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

    $root = $_SERVER["DOCUMENT_ROOT"];
    echo "<div class='header'>";     
    echo "<div class='logo-bar' >";
    echo "<text>Ace Training</text>";
    echo "</div>";
    echo "<div class='vertical-menu'>";
    
    if($_SESSION['userType'] == 'student'){
        echo "<a href='../home.php' title='Home'>Home</a>";
        echo "<a href='../user/resource_downloads.php' title='Resources'>Resources</a>";
        echo "<a href='../user/video_player.php' title='Videos'>Videos</a>";
        echo "<a href='../user/quiz_output.php' title='Quizes'>Quizes</a>";
        echo "<a href='../user/course_enroll.php' title='Course Enrollment'>Course Enrollment</a>";
        echo "<a href='../functions/logout.php' title='Log Out'>Log Out</a>";
        echo "<a href='https://www.freeprivacypolicy.com/live/778b4585-8241-469c-9e24-6ca7fa5130ca' title='Privacy Policy'>Privacy Policy</a>";
        echo "<p>Copyright 2022</p>";

    } else if($_SESSION['userType'] == 'tutor' || $_SESSION['userType'] == 'admin'){
        if($_SESSION['currentDir'] == "other"){
            echo "<a href='./home_other.php' title='Home'>Home</a>";
            echo "<a href='../resource_downloads.php' title='Resources'>Resources</a>";
            echo "<a href='../video_player.php' title='Videos'>Videos</a>";
            echo "<a href='../quiz_output.php' title='Quizes'>Quizes</a>";

            echo "<a href='./course_creation.php' title='course_creation'>Course Creation</a>";
            echo "<a href='../course_enroll.php' title='Course Enrollment'>Course Enrollment</a>";
            echo "<a href='./course_enrollment_authorisation.php' title='course_enrollment'>Course Enrollment Authorisation</a>";
            echo "<a href='./quiz_upload.php' title='quiz_upload'>Quiz Upload</a>";
            echo "<a href='./resource_upload.php' title='resource_upload'>Resource Upload</a>";
            echo "<a href='./video_upload.php' title='video_upload'>Video Upload</a>";
            echo "<a href='./user_author.php' title='user_athor'>User Authorisation</a>";
            echo "<a href='../../functions/logout.php' title='Log Out'>Log Out</a>";
            echo "<a href='https://www.freeprivacypolicy.com/live/778b4585-8241-469c-9e24-6ca7fa5130ca' title='Privacy Policy'>Privacy Policy</a>";
        echo "<p>Copyright 2022</p>";
        } else {
            echo "<a href='./other/home_other.php' title='Home'>Home</a>";
            echo "<a href='./resource_downloads.php' title='Resources'>Resources</a>";
            echo "<a href='./video_player.php' title='Videos'>Videos</a>";
            echo "<a href='./quiz_output.php' title='Quizes'>Quizes</a>";

            echo "<a href='./other/course_creation.php' title='course_creation'>Course Creation</a>";
            echo "<a href='./course_enroll.php' title='Course Enrollment'>Course Enrollment</a>";
            echo "<a href='./other/course_enrollment_authorisation.php' title='course_enrollment'>Course Enrollment Authorisation</a>";
            echo "<a href='./other/quiz_upload.php' title='quiz_upload'>Quiz Upload</a>";
            echo "<a href='./other/resource_upload.php' title='resource_upload'>Resource Upload</a>";
            echo "<a href='./other/video_upload.php' title='video_upload'>Video Upload</a>";
            echo "<a href='./other/user_author.php' title='user_athor'>User Authorisation</a>";
            echo "<a href='../functions/logout.php' title='Log Out'>Log Out</a>";
            echo "<a href='https://www.freeprivacypolicy.com/live/778b4585-8241-469c-9e24-6ca7fa5130ca' title='Privacy Policy'>Privacy Policy</a>";
        echo "<p>Copyright 2022</p>";
        }

    } else {
        echo "<a href='../index.php' title='Home'>Home Page</a>";
    }

    /*
    echo "<a href='.././user/index.php' title='Home'>Home</a>";
    echo "<a href='.././user/student/resource_downloads.php' title='Resources'>Resources</a>";
    echo "<a href='.././user/student/video_player.php' title='Videos'>Videos</a>";
    echo "<a href='.././user/student/quiz_output.php' title='Quizes'>Quizes</a>";
    echo "<a href='../login.php' title='Log Out'>Log Out</a>";
    */
    echo "</div>";
    echo "</div>";
?>