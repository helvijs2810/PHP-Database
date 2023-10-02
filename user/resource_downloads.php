<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$_SESSION['currentDir'] = basename(__DIR__);

require_once("../functions/connect.php");

require_once("../functions/redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Download files</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<header>
    <?php include("../include/header.php") ?>
</header>
    <table style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
        <thead>
            <th>ID</th>
            <th>Filename</th>
            <th>Action</th>
        </thead>
        <tbody>
<?php 
            
$sql = "SELECT * FROM ace_files";
$result = mysqli_query($conn, $sql);

$currentDate = date('Y-m-d');
$nowTime = strtotime($currentDate);
while($row = mysqli_fetch_assoc($result)){
    $startTime = strtotime($row['file_start']);
    $endTime = strtotime($row['file_expiry']);
    if($nowTime >= $startTime && $nowTime <= $endTime){
        echo '<tr>';
        echo '<td>'.$row["file_id"].'</td>';
        echo '<td>'.$row["file_name"].'</td>';
        echo '<td><a href="resource_downloads.php?id='.$row["file_id"].'">Download</a></td>';
        echo '</tr>';
    }
}
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
          
            $sql2 = "SELECT * FROM ace_files";
            $result2 = mysqli_query($conn, $sql);

              // fetch file to download from database
              while($file = mysqli_fetch_assoc($result2)){
                  if($file['file_id'] == $id){
                    $filepath = '../resources/' . $file['file_name'];

                    if (file_exists($filepath)) {
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename=' . basename($filepath));
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize('resources/' . $file['file_name']));
                        readfile('resources/' . $file['file_name']);
                    }
                  }
              }
          }
?>
        </tbody>
    </table>
<footer>
    <?php include("../include/footer.php")?>
</footer>
</body>

</html>