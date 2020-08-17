<?php

$username = $_SESSION["username"];
$mysqli = new mysqli('localhost','root','Nyuna','web') or die(mysqli_error($mysqli));

$gender = '';
$color = '';
$password = '';
$email = '';
$update = false;
$id = 0;



if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM akun WHERE id=$id") or die($mysqli->error());
	$row = $result->fetch_array();
	$name = $row['username'];
	$gender = $row['gender'];
	$color = $row['color'];
	$password = $row['password'];
	$email = $row['email'];
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$gender = $_POST['gender'];
	$color = $_POST['color'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$mysqli->query("UPDATE akun SET  gender='$gender', color='$color',  password='$password',email='$email' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Database record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("refresh:0;url=info.php");
}

?>