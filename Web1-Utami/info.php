<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no" >
        <title>Account Information</title>
        
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
<style>
body{
	font-size: 13px;
}

.form-control{
	font-size: 13px;
}
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
		color: black;
		padding: 6px 5px;
		border: 1px solid #FFF;
    }
</style>

</head>
<center> <body background="https://www.sharepointshepherd.com/wp/wp-content/uploads/2015/10/background-clouds-med.jpg">
	<!--Header-->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<img src="">
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="home.php">Home</a></li>
					<li class="active"><a href="info.php"></span> Account Information</a></li>
					<li><a href="member.php"> Show All Member</a></li>
					<li><a href="index.html" > Log-out</a></li>
					
				</ul>				
			</div>
		</div>
    </nav>
    <h1>Account Information  </h1>
	<?php require_once 'editinfo.php'; ?>
	
	<?php 
	if (isset($_SESSION['message'])):
	?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			?>
	</div>
	
	<?php
		endif
	?>

	<div class="container">
	<?php
		$mysqli = new mysqli('localhost','root','Nyuna','web') or die (mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM akun") or die($mysqli->error());
		
        $username = $_SESSION["username"];
	?>

		<div class="row justify-content-center">
			<table class="table" >
				<thead>
					<tr  bgcolor='#abd7eb'>
						<th>Username</th>
						<th>Password</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Favorite Color</th>
						<th >Action</th>
					</tr>
				</thead>
		<?php
		if($result->num_rows > 0){  
			while ($row = $result->fetch_assoc())
			{
				if($username == $row["username"]){
			 ?>
				<tr>
					<td><?php echo $row['username'];?></td>
					<td><?php echo $row['password'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td style="background-color: <?php echo $row['color'];?>"><?php echo   $row["color"]?></td>
					
					<td>
						<a href="info.php?edit=<?php echo $row['id'];?>"
							class="btn btn-info">Edit</a>
					</td>
				</tr>
				<?php }}} ?>
			</table>
		</div>
		
	<div class="row justify-content-center">
		<form action="editinfo.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<div >
				<label>Username :</label>
				<input  type="text" name="username" class="form-control"  value="<?php echo $username;?>">
			</div>
			<div class="form-group">
				<label>Password :</label>
				<input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
            </div>
            <label>Gender :</label>
			<div >
			<div class="custom-control custom-radio">
	  			<input type="radio" class="custom-control-input" id="male" name="gender" value="Male" <?php echo ($gender=='Male')?'checked':'' ?>>
	  			<label class="custom-control-label" for="male">Male</label>
			</div>
			<div class="custom-control custom-radio">
				  <input type="radio" class="custom-control-input" id="female" name="gender" value="Female" <?php echo ($gender=='Female')?'checked':'' ?>>
				  <label class="custom-control-label" for="female">Female</label>
			</div>
			</div>
			<div class="form-group">
				Select your favorite color :  <input type="color" name="color" value="<?php echo $color; ?>">
			</div>
			
			<div class="form-group">
				<label>Email :</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
			</div>
			<div class="form-group">
				<?php
				if ($update == true):
				?>
				<button type="submit" class="btn btn-info" name="update">Update</button>
					
				<?php endif; ?>
			</div>
		</form>
	</div>
</div>
</body>