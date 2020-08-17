<!DOCTYPE HTML>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>File Home Page</title>
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
	<!--Header-->
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto navbar-right">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="info.php">Account Information</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="member.php">All Member Information</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="boardmsg.php">Board Message</a>
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
      <center>  <h2 > Home Page / Upload Files </h2> 
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
        <table class="table table-bordered" >
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
	</div>
	</body>
</html>
