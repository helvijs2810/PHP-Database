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
        <title text-align=center>Welcome to Ace Training</title>
        <link rel="stylesheet" type="text/css" href="../../style/style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
        <header>
            <?php include("../../include/header.php") ?>
        </header>
        <main style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
        <?php
            echo '<p>Welcome'.$_SESSION["userName"].'!</p>';
                /*
                $sql = mysqli_query($conn, "SELECT * FROM user_courses");
                while($result = mysqli_fetch_assoc($sql)){
                    if($result['user_name'] == $_SESSION['userName']){
                        $courseType = $result['course'];
                    }
                }
    
                while($result = mysqli_fetch_assoc($sql)){
                    if($result['course'] == $courseType){
    
    
                        echo "<form id='submit-completion' method='post' action='./functions/completion.php'>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Student Name</th>";
                        echo "<th>Studen Modules</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th>".$result['user_name']."</th>";
                        echo "<form>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</form>";
                    }
                }
                */
        ?>
        </main>
        <footer>
            <?php include("../../include/footer.php")?>
        </footer>
    </body>
</html>