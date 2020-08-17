<?php
require("editmsg.php");

date_default_timezone_set("Asia/Taipei");
$date=date("Y-m-d H:i:s");

session_start();
$id = $_SESSION['id'];


$sql = mysqli_query($con, " UPDATE ask SET question='$_POST[msg]', time='$date' WHERE id=\"".$id."\"");

if(!$sql){
    echo "<script>alert('Update failed')</script>";
}else{
    echo "<script>alert('Update completed')</script>";
}

header('refresh:0; url= boardmsg.php');
?>