<?php

    $server="localhost";
    $db_username="root";
    $db_password="Nyuna";
    $db = "web";

    
    $con = mysqli_connect($server,$db_username,$db_password,$db);

    if(!$con){
        die("can't connect".mysqli_error());      
    }
    else {
        
        $sql = "SELECT username,gender,color,email  FROM akun";
        $rows = mysqli_query($con,$sql);      
        $num = mysqli_num_rows($rows); 

            
    }
?>
 <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>Member Information</title>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<img src="">
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="home.php">Home</a></li>
					<li><a href="info.php"></span> Account Information</a></li>
					<li class="active"><a href="member.php"> Show All Member</a></li>
					<li><a href="index.html" > Log-out</a></li>
					
				</ul>				
			</div>
		</div>
	</nav>
</head>
 
    
     <center><h1>All Member Information  </h1></center/>
     
     <center><table class="table" ></center/>
      <tr bgcolor='#abd7eb'>
	  	<th>No.</th>
        <th>Username</th>
        <th>Gender</th>
		<th>E-mail</th>
		<th>Favorite color</th>
        
      </tr>
      
    <?php
        while($row = mysqli_fetch_array($rows)){
			$i=0;
			$i++;
    ?>        
          <tr>
			<td><?php echo $i;?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['gender']?></td>
			<td><?php echo $row['email']?></td>
			<td style="background-color:<?php echo $row['color']; ?>" > <?php echo $row['color']; ?> </td>
                    
          </tr>
    <?php
    }
        
    ?>
    </table>

    <p>&nbsp;</p>
</body>
</html>