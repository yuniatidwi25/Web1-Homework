<?php
   session_start();

   if( $realfile = $_SESSION["realfile".$_GET['id']]){
        echo $realfile;
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=".($realfile));
        readfile($realfile);
    }   
    else
        echo "Can't get the file!";

$uri = $_SERVER['REQUEST_URI'];
$temp = explode("?", $uri);
$filename = end($temp);

header("Content-Disposition: attachment; filename=$filename");
readfile($filename);

?>