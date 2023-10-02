<?php
// connect to the database
require_once("connect.php"); 

// Uploads files
if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myFile']['name'];

    // destination of the file on the server
    $destination = '../resources/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $fileCors = $_POST["fileCourse"];
    $start = $_POST["fileStart"];
    $end = $_POST["fileEnd"];
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myFile']['tmp_name'];
    $size = $_FILES['myFile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'pptx'])) {
        echo "Your file extension must be .zip, .pdf, .pptx or .docx";
    } elseif ($_FILES['myFile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO ace_files (file_name, file_course, file_start, file_expiry) VALUES ('$filename', '$fileCors', '$start', '$end')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>