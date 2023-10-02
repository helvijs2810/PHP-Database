<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if($_SESSION['userType'] != "student"){
    header('Location: ./user/other/home_other.php');
}
    require_once("./functions/connect.php");
    //require("./redirect.php");
    //define ('SITE_ROOT', realpath(dirname(__FILE__)));
?>
<!DOCTYPE html>
<html>
    <head>
        <title text-align=center>Welcome to Ace Training</title>
        <link rel="stylesheet" type="text/css" href="./style/style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body >
        <header>
            <?php include("./include/header.php") ?>
        </header>
        <div style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
        <main >
        <?php
        if($_SESSION['userType'] == "student"){
            if($row = mysqli_query($conn, "SELECT * FROM user_courses WHERE user_name='".$_SESSION['userName']."'")){
                while($result = mysqli_fetch_assoc($row)){
                    if($result['course_authorised'] == "True"){
                        $sql2 = mysqli_query($conn, "SELECT * FROM user_courses");
                        $compModules = 0;
                        $things2 = array();
                        $personCourse = "";
                            
                        while($result = mysqli_fetch_assoc($sql2)){
                            if($result['user_name'] == $_SESSION['userName']){
                                $things2 = explode(",", $result['completed_modules']);
                                $personCourse = $result['course'];
                            }
                        }
                            
                        foreach($things2 as $value){
                            $compModules++;
                        }
        
                        $sql = mysqli_query($conn, "SELECT * FROM ace_courses");
        
                        $numbModules = 0;
                        $things = array();
                        $things2 = array();
                        
                        while($result = mysqli_fetch_assoc($sql)){
                            if($result['course'] == $personCourse){
                                $things = explode(",", $result['course_modules']);
                            }
                        }
                        
                        foreach($things as $value){
                            $numbModules++;
                        }
                        
                        $percent = round(100 * ($compModules / $numbModules));
        
                        $str = implode(' ', array('Welcome', $_SESSION["userName"], '!'));
                        echo '<p>' .$str. '</p>';
                        echo '<label for="progress">Course Progress:</label>';
                        echo '<progress id="progress" value="'.$percent.'" max="100">'.$percent.'</progress>';
                    } else {
                        echo "<p>Poop</p>";
                    }
                } 
            } else {
                echo '<p>Welcome! Looks like you have not registered for course yet</p>';
                echo '<p>Please ensure you register for course to get course content</p>';
            } 
            }
        ?>
        </div>
        </main>
        <footer>
            <?php include("./include/footer.php")?>
        </footer>
    </body>
</html>