<?php 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    //Time to Live for session in seconds (5 mins: 60 * 5 = 300s)
    $timetolive = 300;

    $time = $_SERVER['REQUEST_TIME'];

    //If user has not successfully loged in (i.e. token does not exist), redirect to login
    if(!isset($_SESSION['token'])){
        header('Location: ../../login.php');
    } else {
        //Time to Live where time pasted is checked redirect to logout routine
        if(isset($_SESSION['LAST_VISIT']) && ($time - $_SESSION['LAST_VISIT']) > $timetolive){
            header('Location: logout.php');
        }
    }

    $_SESSION['LAST_VISIT'] = $time;

    if($_SESSION['userType'] == 'student' && $_SESSION['currentDir'] == 'other'){
        header('Location: ../../home.php');
    }

?>