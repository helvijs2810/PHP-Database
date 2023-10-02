<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$_SESSION['currentDir'] = basename(__DIR__);

require_once("../functions/connect.php");

require_once("../functions/redirect.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<header>
    <?php include("../include/header.php") ?>
</header>
<main>
<div style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
<?php
$sql = mysqli_query($conn, "SELECT * from ace_quiz");

while($result = mysqli_fetch_assoc($sql)){
	if($result['quiz_course'] == 'Physics'){
		echo "<button type='button' class='collapsible'>".$result['quiz_topic']."</button>";
		echo "<div class='content'>";
		echo "<form>";

		$row = 1;
		$file = $result['f_name'];
		if (($handle = fopen("../quizes/".$file, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			$row++;
			for ($c=0; $c < $num; $c++) {
				if($row > 2){
					echo "<div>";
					if($c == 0){
						echo "<p>".$data[$c]."</p>";
					} else if($c == 1){
						if($data[$c] !== "Text"){
							$answ = explode('/',  $data[$c+1]);
							foreach($answ as $value){
								echo "<label for='".$value."'>".$value."</label>";
								echo "<input value='".$value."' type='".strtolower($data[$c])."' name='".$row."'>";
							}
						} else {
							echo "<input type='".strtolower($data[$c])."'>";
						}
					} 
					echo "</div>";
				}
			}
		}
		fclose($handle);
		}

		echo "</form>";
		echo "</div>";
	}
}
?>
</div>
</main>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<footer>
    <?php include("../include/footer.php")?>
</footer>
</body>
</html>
