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
        $id = $_GET['idr'];
        $re=mysqli_query($con,"SELECT * FROM reply WHERE idr='$id'")or die("can't connect".mysqli_error());
        if($row = mysqli_fetch_array($re)) {
            if($row[username] != $username) {     
                 echo $username.$row[username];
                 echo "<script>alert('This is not you, you cannot edit')</script>";
                 header("refresh:0;url=boardmsg.php");
             }
        }              
    }
?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Edit Reply Message</title>
    <link rel="icon" type="image/svg" href="https://d29fhpw069ctt2.cloudfront.net/icon/image/38476/preview.svg">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body background="https://www.sharepointshepherd.com/wp/wp-content/uploads/2015/10/background-clouds-med.jpg">
<center><h2>Edit Reply Message</h2></center>
<div class="container">
    <p class="pull-right">Edit message as  <?php echo $username; ?></p>
	<h4>Edit message</h4>
    <form action="updatereply.php" method="post">
        <textarea name="pesan" class="form-control" >
            <?php     
                $re=mysqli_query($con,"SELECT * FROM reply WHERE idr='$id'")or die("can't connect".mysqli_error());
                if($row = mysqli_fetch_array($re)) {
                    if($row[username] == $username) {     
                        echo  $row[answer];
                        $_SESSION['idrr'] = $row[idr];
                    } 
                } 
                   
            ?>

            </textarea>
        <br>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm pull-right">
		<a href="boardmsg.php" class="btn btn-danger btn-sm pull-left">Cancel </a>
    </form>
</div>
</body>

</html>