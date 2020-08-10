<!DOCTYPE HTML>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>File Home Page</title>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    
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
    .btn2{
		font-size: 15px;
		color: black;
        padding: 9px 16px;
        background-color:#abd7eb;
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
                    
					<li class="active"><a href="home.php">Home</a></li>
					<li><a href="info.php"></span> Account Information</a></li>
					<li><a href="member.php"> Show All Member</a></li>
					<li><a href="index.html" > Log-out</a></li>
					
				</ul>				
			</div>
		</div>
	</nav>
              
       <center> 
       <h2 ><?php
                    session_start();
                    $username = $_SESSION["username"];
                    echo "Hello, ".$username."!";
                    ?> </h2> 
       <table class="table" style="border-top-style: hidden">
            <tbody>
                <tr>
                    <td align="left">
                        <form class="d-inline-block" id="file_form" action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" id="selectedFile" name="my_file" />  File size below 1Mb, do not use space in your file name. 
                    <td width="10%" align="right">
                    <input type="submit" class="btn btn-info" value="Upload File">
                    </td>
                        </form>
                </tr>
            </tbody>
        </table>
       <br>
        <table class="table">
            <tr  bgcolor="#abd7eb"  >
                <th>No.</th>
                <th>File Name</th>
                <th>File Size (KB)</th>
                <th>Upload Time</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
                $dir = "./folder";
                $handle = @opendir($dir) or die("Cannot open " . $dir);
                date_default_timezone_set("Asia/Taipei");
             
                $username = $_SESSION["username"];
                $i = 0;
               
                while($file = readdir($handle)){     
                    if($file != "." && $file != ".."){
                        $realfile = $dir . "/" . $file;
                        
                        $i++;
                        $_SESSION["realfile".$i]=$realfile;
                        $_SESSION["old_file".$i]=$file; 
                        
                        $url = "download.php?id=".$i;
                        $url_2 = "rename.php?id=".$i;
                        
                        
                        $fileSize = filesize($realfile)/1024;
                        $Date = date("Y-m-d H:i:s",filemtime($realfile));
                       
                        echo "<tr>";
                        echo "<td> $i </td>";
                        echo "<td> $file </td>";
                        echo "<td>$fileSize</td>";
                        echo "<td>$Date</td>";
                        echo "<td> <a href='$url_2' class='btn btn-info'>Rename</a> <a href='$url'class='btn btn-info'>Download</a>";  
                        echo "<form method='post' action='delete_file.php'>";
                        echo "<input type='hidden' name='file_name' value='$file'>";
                        echo "<input type='submit' class='btn btn-danger' name='delete_file' value='Delete'>";
                        echo "</form>";
                        echo "</td>"; 
                        echo "</tr>";
                     }
                     
                }
                closedir($handle);
                ?>
      
        </table>      
	</body>
</html>
