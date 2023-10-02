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
<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<body>
<header>
    <?php include("../include/header.php") ?>
</header>
<form id="course-enroll-form" action="../functions/enroll.php" method="post" style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
	<table class="author-table">
		<tr>
			<th>Number</th>
			<th>Course</th>
			<th>Enroll</th>
		</tr>
       	<?php
            $number = 0;
			$result = mysqli_query($conn, "SELECT course FROM ace_courses");
			/*
			if($_SESSION['userType'] == 'tutor'){
				$result = mysqli_query($conn, "SELECT forename FROM ace_users WHERE user_authorised='False' AND user_type='student'");
			} else {
				$result = mysqli_query($conn, "SELECT forename FROM ace_users WHERE user_authorised='False' AND user_type='tutor'");
			}
			*/
               	while($row = mysqli_fetch_array($result)){
               		$number++;
					echo "<tr>"; 
               		echo "<td><p>".$number."</p></td>";
               		echo "<td><p>".$row['course']."</p></td>";
					echo "<td><input type='checkbox' name='courseEnroll[]' value='".$row['course']."'></td>";
               		echo "</tr>";
               	}
		?>   
		<tr>    		           		
        	<td><input type="submit" name ="submit" value="Enroll" /></td>
		</tr>    
	</table>
</form>
<div id="report">
</div>
<script>
$(document).ready(function() {
    $("#author-form").validate({
		errorPlacement: function(error, element) {
     		error.appendTo('#report');
   		},
        rules: {
            "courses[]" : {
            	required: true,
				minlength: 1
            }
        }
    });
});
</script>
<footer>
    <?php include("../include/footer.php")?>
</footer>
</body>
</html>