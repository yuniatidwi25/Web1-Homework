<?php
require("editreply.php");

date_default_timezone_set("Asia/Taipei");
$date=date("Y-m-d H:i:s");

session_start();
$idr = $_SESSION['idrr'];
$content = $_POST['pesan'];


$sql = mysqli_query($con, " UPDATE reply SET answer='$content', time='$date' WHERE idr='$idr'");
if(!$sql){
    echo "<script>alert('Update failed')</script>";
}else{
    echo "<script>alert('Update completed')</script>";
}

header('refresh:0; url= boardmsg.php');
?>