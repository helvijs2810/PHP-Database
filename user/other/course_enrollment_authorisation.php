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
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
</head>
<header>
    <?php include("../../include/header.php") ?>
</header>
<body>
<form method="POST" action="course_enrollment_authorisation.php" class="form" style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
    <table>
        <tr>
            <th>Username</th>
            <th>Course</th>
            <th>Authorisation</th>
            <th></th>
        </tr>
<?php
if($_SESSION['userType'] == "tutor"){
    $sql = "SELECT * FROM user_courses WHERE user_type='student'";
} else {
    $sql = "SELECT * FROM user_courses";
}

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))    {
    if($row['course_authorised'] == 'False'){
        echo '<tr>';
        echo '<td>'.$row["user_name"].'</td>';
        echo '<td>'.$row["course"].'</td>';
        echo '<td>'.$row["course_authorised"].'</td>';
        echo '<td><input type="checkbox" name="chk1[]" value="'.$row["user_course_id"].'"></td>';
        echo '<td>'.$row["user_course_id"].'</td>';
        echo '</tr>';
    }
}
?>
    </table>
    <!-- <input type="Submit" name="authorise" value="Authorise"> -->
    <button style = "background-color: #15223d;" type="submit" class="button" name="authorise" value="Authorise"><span>Authorise </span> </button>
</form>
<footer>
    <?php include("../../include/footer.php")?>
</footer>
</body>
<?php
echo "<br>";
if(!empty($_POST['chk1'])) {
    foreach($_POST['chk1'] as $check) {
            $sql = "UPDATE user_courses SET course_authorised='True' WHERE user_course_id={$check}";
            // echo $sql;
            $query = mysqli_query($conn, $sql);
            // echo "<br>";
    }
}
?>
</html>