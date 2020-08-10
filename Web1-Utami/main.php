<?php
    $server="localhost";
    $db_username="root";
    $db_password="Nyuna";
    $db = "web";

    function CheckUserName($con,$username) {
        $sql = "SELECT username FROM akun";
        $result =mysqli_query($con,$sql);

            if($result->num_rows > 0){  
                while($row = $result->fetch_assoc()){
                    if($username == $row["username"]){

                        echo "<script>alert(The account already exist!)</script>";
                        header("refresh:0;url=index.html");
                        exit();  
                    }     
                }  
            }
    }

    $con = mysqli_connect($server,$db_username,$db_password,$db);

    if(!$con){
        die("can't connect".mysqli_error());      
    }
    else if(isset($_POST["SignUp"])){
        
        session_start();
        $username=$_POST['username'];
        
        CheckUserName($con,$username); 
        
        $password=$_POST['password'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $color=$_POST['color'];
        
        
        if($username == ""){        
            echo "<script>alert('please enter your username')</script>";
            header("refresh:0;url=index.html");	
        }
        else if($password == ""){
            echo "<script>alert('please enter your password')</script>";
            header("refresh:0;url=index.html");	
        }
        else if($email == ""){
            echo "<script>alert('please enter your E-mail')</script>";
            header("refresh:0;url=index.html");
        }
        else if($gender == ""){
            echo "<script>alert('please enter your gender')</script>";
           header("refresh:0;url=index.html");
        }
        else if($color == ""){
            echo "<script>alert('please enter your favorite color')</script>";
            header("refresh:0;url=index.html");
        }
        
        else{      
            $q="insert into akun(username,password,email,gender,color) values ('$username','$password','$email','$gender','$color')";
            $result=mysqli_query($con,$q);
        }
  
        if(!$result){  
            die('Error: ' . mysqli_error());
        }
        else{
            echo "Your sign up success!";
            $_SESSION['username'] = $username;
            header("refresh:0;url=home.php");
        }
        
    }
    else if(isset($_POST["Login"])){
        session_start();
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        if ($username && $password){
            $sql = "select * from akun where username = '$username' and password='$password'";
            $result = mysqli_query($con,$sql);
            $rows=mysqli_num_rows($result);
            if($rows){  
                $_SESSION['username'] = $username;
                header("refresh:0;url=home.php");
                exit();
            }
            else{
                echo "<script>alert('Incorrect username/password, or your account didn't registered.')</script>";
                header("refresh:0;url=index.html");
            }
        }
        else{
            echo "<script>alert('you didn't enter anything')</script>";
            header("refresh:0;url=index.html");
            
        }
    }   
     mysqli_close($con);  
   
?>
