<?php
error_reporting(0);

require("replymsg.php");
$username = $_SESSION['username'] ;
$idr = $_GET[idr];
echo $answer;

$re = mysqli_query($con,"SELECT username FROM reply WHERE idr=\"".$idr."\"") or die("can't connect".mysqli_error());



if($row = mysqli_fetch_array($re)){
    if($row[username] == $username){     
        $reslut = mysqli_query($con,"DELETE FROM reply WHERE idr=\"".$idr."\"");

        echo "<script>alert('Successfully deleted')</script>";
    }
    else
        echo "<script>alert('This is not you, you cannot delete!')</script>";
}


header("refresh:0;url=boardmsg.php");;
?>