<?php

if(isset($_SESSION)){
    header('Location: ./home.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Ace Training</title>
        <link rel="stylesheet" type="text/css" href="./style/style.css">
    </head>
    <body>
        <header><?php include('./include/header.php');?></header>

        <h2 class="front-page-text">Welcome to Ace Training</h2>

        <button class="button" onclick="location.href = 'login.php';"><span>Login </span> </button>
    </body>
</html>