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


<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>Message Board</title>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		font-size: 13px;
		color: white;
		padding: 12px 14px;
		border: 2px solid #FFF;
    }
    .btn2{
		font-size: 12px;
		color: white;
        padding: 5px 9px;
		border: 2px solid #FFF;
    }
	
</style>
</head>
<body background="https://www.sharepointshepherd.com/wp/wp-content/uploads/2015/10/background-clouds-med.jpg">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto navbar-right">
        <li class="nav-item ">
          <a class="nav-link" href="boardmsg.php" >Back to message board</a>
        </li>
        
      </ul>
   </div>
	</nav>
    
    <div class="container">
        <h3 class="text-center">Reply Message </h3>
        <p class="pull-right">----Reply message as <?php echo $username."----"; ?></p>
        <form action="addreply.php" method="post">
            <textarea name="msg" class="form-control" placeholder="Input your reply here"></textarea><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-left">
            <br><label> </label><br>
        </form>
                
        <center><br><table class="table table-bordered" ></center/>
        <tr bgcolor='#abd7eb'>
	  	    <th width="10%"><center>Username</th>
            <th width="52%"><center>Content</th>
		    <th width="12%"><center>Time</th>
		    <th width="16%"><center>Action</th>
        </tr>
        
        <?php
        $_SESSION['reply_id'] = $id = $_GET['id'];
        $re=mysqli_query($con,"SELECT * FROM reply WHERE reply_id=\"".$_SESSION['reply_id']."\"");
        if(mysqli_num_rows($re)>0){
            while($row=mysqli_fetch_array($re))
            {
            ?>        
                <tr>
                  <td><center><?php echo $row['username']?></td>
                  <td><center><?php echo $row['answer']?></td>
                  <td> <center><?php echo $row['time']; ?> </td>   
                  <td><center><?php 
                   echo "<a href=\"editreply.php?answer=$row[answer]\" class=\"btn2 btn-warning btn-xs\">EDIT</a>
                   <a href=\"delreply.php?answer=$row[answer]\" class=\"btn2 btn-danger btn-xs\">DELETE</a>";
                  ?>
                  </td>
                </tr>
          <?php
            }
        }
        
    ?>
    </table>

    <p>&nbsp;</p>  
    </div>
</body>

</html>