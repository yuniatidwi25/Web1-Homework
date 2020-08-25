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
    }

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>Member Information</title>
        <link rel="icon" type="image/svg" href="https://d29fhpw069ctt2.cloudfront.net/icon/image/38476/preview.svg">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <style>
	.navbar{
		margin-bottom: 0;
		border-radius: 0;
		background-color: #abd7eb ;
		color:#2c3d63;
		padding: 1% 0;
		font-size: 1.2em;
		border: 0;
	}
	.navbar-brand{
		float: left;
		min-height: 55px;
		padding: 0 15px 5px;
	}
	.navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus, .navbar-inverse .navbar-nav .active a:hover{
		color: black;
		background-color: #abd7eb;
	}
	.navbar-inverse .navber-nav li a{
		color: #2c3d63;
	}
	.carousel-caption{
		top: 64%;
		transform: translateY(-80%);
	}
	.btn{
		font-size: 15px;
		color: black;
		padding: 12px 16px;
		border: 2px solid #FFF;
    }
    
	
</style>
		
    </head>
	<body background="https://www.sharepointshepherd.com/wp/wp-content/uploads/2015/10/background-clouds-med.jpg">
	<!--Header-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto navbar-right">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="info.php">Account Information</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="member.php">All Member Information</a>
        </li>
		<li class="nav-item active">
          <a class="nav-link" href="boardmsg.php">Board Message</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="subscribe.php">Subscribe</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
                    session_start();
                    $username = $_SESSION["username"];
                    echo "Hello, ".$username."!";
                    ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.html">Logout</a>
            </div>
      </ul>
   </div>
</nav>
    <div class="container">
    <center><h2> Message Board </h2> </center>
    <p class="pull-right">----Leave a message as <?php echo $username."----"; ?></p>
    <h4>Add new message</h4>
    <form action="addmsg.php" method="post">
        <label>Title :</label>
        <input  type="text" name="title"  placeholder="Input your title here">
        <textarea name="content" class="form-control" placeholder="Input your message here"></textarea><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-left">
        <br><label> </label><br>
    </form>
    
    <center><br><table class="table table-bordered" ></center/>
        <tr bgcolor='#abd7eb'>
	  	    <th width="10%"><center>Username</th>
            <th width="10%"><center>Title</th>
            <th width="45%"><center>Content</th>
		    <th width="15%"><center>Time</th>
		    <th width="20%"><center>Action</th>
        </tr>
        
        <?php
        $re=mysqli_query($con,"SELECT * FROM ask");
        if(mysqli_num_rows($re)>0){
            while($row=mysqli_fetch_array($re))
            {
            ?>        
                <tr>
                  <td><center><?php echo $row['username']?></td>
                  <td><center><?php echo $row['title']?></td>
                  <td><center><?php echo $row['question']?></td>
                  <td> <center><?php echo $row['time']; ?> </td>   
                  <td><center><?php 
                   echo "<a href=\"replymsg.php?id=$row[id]\" class=\"btn2 btn-success btn-xs\">REPLY</a>
                   <a href=\"editmsg.php?id=$row[id]\" class=\"btn2 btn-warning btn-xs\">EDIT</a>
                   <a href=\"delmsg.php?id=$row[id]\" class=\"btn2 btn-danger btn-xs\">DELETE</a>";
                  ?>
                  </td>
                </tr>
          <?php
            }
    }
        
    ?>
    </table>
    </div>
    <p>&nbsp;</p>
    </body>
</html>