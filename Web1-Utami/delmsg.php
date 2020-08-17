<?php
error_reporting(0);

require("boardmsg.php");
$username = $_SESSION['username'];
$id = $_GET[id];

$re = mysqli_query($con,"SELECT username FROM ask WHERE id='$id'") or die("can't connect".mysqli_error());

if($row = mysqli_fetch_array($re)){
    if($row[username] == $username){     
        $result = mysqli_query($con,"DELETE FROM ask WHERE id='$_GET[id]'");
        
        echo "<script>alert('Successfully deleted')</script>";
    }
    else
        echo "<script>alert('This is not you, you cannot delete!')</script>";
}

header("refresh:0;url=boardmsg.php");
?>