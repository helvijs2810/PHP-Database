<?php
	require_once("../functions/connect.php");

	if(isset($_POST['authorize']))
		{
    	foreach($_POST['authorize'] as $forename) {
            $sql = "UPDATE ace_users SET user_authorised = 'True' WHERE forename = '$forename'";
		    mysqli_query($conn, $sql);
    	}
	}
	header("refresh:10; url=../user/other/user_author.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<p>Users successfully authorized</p>
	<p id="counter"></p>
<script>
var timeleft = 10;

var redirectTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(redirectTimer);
    document.getElementById("counter").innerHTML = "Redirecting...";
  } else {
    document.getElementById("counter").innerHTML = "Redirecting in " + timeleft + " seconds...";
  }
  timeleft -= 1;
}, 1000);
</script>
</body>
</html>