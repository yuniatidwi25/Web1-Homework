<?php
if(isset($_POST['delete_file']))
{
 $filename = $_POST['file_name'];
 unlink('folder/'.$filename);
}
echo "<script>alert('Your file successfully deleted')</script>";   
header("refresh:0;url=home.php");
?>