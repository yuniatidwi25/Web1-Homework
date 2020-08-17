<?php
require("boardmsg.php");

date_default_timezone_set("Asia/Taipei");
$date=date("Y-m-d H:i:s");

$sql=mysqli_query($con,"INSERT INTO ask(username, title, question, time) 
VALUES('$_SESSION[username]', '$_POST[title]', '$_POST[content]','$date')");

header('refresh:0; url= boardmsg.php');
?>