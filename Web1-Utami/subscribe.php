<?php
    $server="localhost";
    $db_username="root";
    $db_password="Nyuna";
    $db = "web";

    
    $con = mysqli_connect($server,$db_username,$db_password,$db);

    if(mysqli_select_db ($con,$db)){

    }
    if ($con->connect_error) {
        die("can't connect: " . $con->connect_error);
    }

    session_start();
    $username = $_SESSION["username"];
    $pesane='';
    
    if(isset($_POST['pesane']))
    {
        $pesane = $_POST['pesane'];
        if($pesane!='')
        {
            echo "<script type='text/javascript'>alert('$pesane');</script>";
            $pesane='';
        }
    }
    $title = "C'mon Subscribe Us!";
    $sub = false;
    $sql = "SELECT * FROM akun where username='$username'";
    $res = $con->query($sql);
    if(mysqli_num_rows ($res))
    {
        $row = $res->fetch_assoc();
        if($row['subscribe'])
        {
            $sub = true;
            $title = "Thank you for your subscribtion!";
        }
        else
        {
            $sub = false;
        }
    }
    $show_video = '';
    $show_button = '';
    if($sub == true)
    {
        $show_video='';
        $show_button='style="display: none;"';
    }
    else
    {
        $show_video='style="display: none;"';
        $show_button='';
    }

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>Subscribe Page</title>
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
        <li class="nav-item  ">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="info.php">Account Information</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="member.php">All Member Information</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="boardmsg.php">Board Message</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="subscribe.php">Subscribe</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
                    
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
       <center> 
       <h2 > <?php echo $title;?> </h2> 
       <table class="table border:none">

            <tr <?php echo $show_button;?>>
                <td align="center">
                    <form action="subscribeupdate.php" method="post">
                        <input type ="submit" class="btn btn-info" value="Subscribe"></input>
                    </form>
                </td>
            </tr>

            <tr <?php echo $show_video;?>>
                <td align="center">
                    <iframe id="video" width="900" height="506" src="https://www.youtube.com/embed/ioNng23DkIM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </td>
            </tr>

        </table>
       
        </div>     
	</body>
</html>
