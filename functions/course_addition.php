<?php

require_once("connect.php"); 

//Pull information from form
$courseName = $conn -> real_escape_string($_POST["course_name"]);
$courseDesc = $conn -> real_escape_string($_POST["course_desc"]);
$array = explode(PHP_EOL, $_POST["course_modules"]);

$courseMod = implode(",", $array);

if($courseName != '' && $courseName  != ''){
    mysqli_query($conn, "INSERT IGNORE INTO ace_courses (course, course_modules, course_info) VALUES ( '{$courseName}', '{$courseMod}' ,'{$courseDesc}')");
} else {
    echo json_encode(['error' => 'Please fill in all fields!']);
}

mysqli_close($conn);

?>