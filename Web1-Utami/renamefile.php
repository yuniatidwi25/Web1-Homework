<!DOCTYPE HTML>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <title>Rename file confirmation page!</title>
        <link rel="icon" type="image/svg" href="https://d29fhpw069ctt2.cloudfront.net/icon/image/38476/preview.svg">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    
        <style>
</style>
</head>
<body >
<?php  
        session_start();
        $new_name = $_POST["new_name"]; 
        $old_name = $_POST["old_name"];


        if(file_exists("./folder/" .$new_name)){ 
            echo "<script>alert('Already have the same name!')</script>"; 
           header("refresh:0;url=home.php");
        }
        else{
           if(rename( "./folder/"."$old_name", "./folder/"."$new_name")){ 
            echo "<script>alert('Successfully rename $old_name to $new_name')</script>";   
            header("refresh:0;url=home.php");
           }
        }

?>
	</body>
</html>