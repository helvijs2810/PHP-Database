<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$_SESSION['currentDir'] = basename(__DIR__);

require_once("../functions/connect.php");

require_once("../functions/redirect.php");
?>
<!doctype html>
<html>
  <head>
    <title>Ace Videos</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
  </head>
  <body>
  <header>
    <?php include("../include/header.php") ?>
  </header>
    <div style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
     <?php
     $acevids = mysqli_query($conn, "SELECT * FROM ace_videos ORDER BY video_id DESC");
     while($row = mysqli_fetch_assoc($acevids)){
       $name = $row['video_name'];
       echo "<video controls height='320px'><source src='../videos/".$name."' type='video/".strtolower(pathinfo($name, PATHINFO_EXTENSION))."'></video>";    
       echo "<br>";
       echo "<span>".$name."</span>";
     }
     ?>
    </div>
    <footer>
    <?php include("../include/footer.php")?>
    </footer>
  </body>
</html>