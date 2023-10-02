<?php 
    session_start();

    $_SESSION = array();

    //Destroy Cookies stored in PHPSESSID
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
    }
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title text-align=center>Logout</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <script>
        //jQuery to clear LocalStorage where token is stored
        $('document').ready(function() {
            localStorage.clear();
            location.href = '../login.php';   
    });
    </script>
</body>
</html>