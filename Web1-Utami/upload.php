<?php
       
    if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){

        session_start();
        $UserName = $_SESSION['username'];

        $FileName = $_FILES['my_file']['name'];            
        $Size = ($_FILES['my_file']['size']/1024);
        
        $UploadTime = date('Y-m-d H:i:s');
        $Tmp_Name = $_FILES['my_file']['tmp_name']; 

        if (file_exists("./folder/" . $FileName)){
            echo "<script>alert('File already exist!')</script>";
        } 

        else if($Size >= 1024){   
            echo "<script>alert('Your file is too large.')</script>";
        }

        else{
            move_uploaded_file($Tmp_Name,"./folder/".$FileName);
            echo "<script>alert('Your file uploaded!')</script>";
        }   
        header("refresh:0;url=home.php");
    } 
    else {
        echo 'error code:' . $_FILES['my_file']['error'] . '<br/>';
    }     

    mysqli_close($con);
?>