<?php

    error_reporting(0);
    $server="localhost";
    $db_username="root";
    $db_password="Nyuna";
    $db = "web";

    $con = mysqli_connect($server,$db_username,$db_password,$db);

    if(!$con){
        die("can't connect".mysqli_error());      
    }

    else{
        mysqli_query($con,"SET NAMES UTF-8");
        session_start();
        $username = $_SESSION['username']  ; 
        $id = $_SESSION['reply_id'];
        
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y-m-d H:i:s");
        
        $sql=mysqli_query($con,"INSERT INTO reply(reply_id, username, answer, time) 
        VALUES('$id','$username','$_POST[msg]','$date')");


        header('Location: boardmsg.php');
    }


?>
