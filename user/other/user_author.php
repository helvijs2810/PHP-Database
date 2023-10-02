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
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<body>
<header>
    <?php include("../../include/header.php") ?>
</header>
<form id="author-form" action="../../functions/author_success.php" method="post" style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
	<table class="author-table">
		<tr>
			<th>Number</th>
			<th>Name</th>
			<th>Authorise</th>
		</tr>
       	<?php
            $number = 0;
			if($_SESSION['userType'] == "tutor"){
				$result = mysqli_query($conn, "SELECT forename FROM ace_users WHERE user_authorised='False' AND user_type='student'");
			} else {
				$result = mysqli_query($conn, "SELECT forename FROM ace_users WHERE user_authorised='False'");
			}

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
               		echo "<td><p>".$row['forename']."</p></td>";
					echo "<td><input type='checkbox' name='authorize[]' value='".$row['forename']."'></td>";
               		echo "</tr>";
               	}
		?>   
		<tr>    		           		
        	<td><input type="submit" name ="submit" value="Authorize" /></td>
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
            "authorize[]" : {
            	required: true,
				minlength: 1
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