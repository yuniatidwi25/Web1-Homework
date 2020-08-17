<?php
    session_start();
    $old_name = $_SESSION["old_file".$_GET['id']];
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>Rename file</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    
        <style>
	
	.btn{
		font-size: 15px;
		color: black;
        padding: 12px 16px;
        background-color:#abd7eb;
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
     <h3>  <form action="renamefile.php" method="post">
            New file name :
            <input type ="text" name="new_name" >
            Old file name :
            <input type ="text" name="old_name" value=<?php echo "$old_name"; ?> >
            <input type ="submit" class="btn btn-info" value="Submit">
             <a href="home.php" class="btn btn-info">Cancel </a>
        </form>
        

	</body>
</html>
   

    


