<?php
require("editreply.php");

date_default_timezone_set("Asia/Taipei");
$date=date("Y-m-d H:i:s");

session_start();
//$id = $_SESSION['iddd'];
$answer = $_SESSION['answerr'];


$sql = mysqli_query($con, " UPDATE reply SET answer='$POST[msg]', time='$date' WHERE answer=\"".$answer."\"");
if(!$sql){
    echo "<script>alert('Update failed')</script>";
}else{
    echo "<script>alert('Update completed')</script>";
}

header('refresh:0; url= boardmsg.php');
?>