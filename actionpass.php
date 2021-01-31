<?php

require_once("database.php");

if(isset($_POST['recover-submit'])){
    
    $email=$_POST['email'];
    if(empty($email)){
        header("location:forgetpass.php");
        exit;
    }
$cemail="SELECT * FROM `users` WHERE `email`='$email'";
$equery= mysqli_query($conn,$cemail);

if(mysqli_num_rows($equery) == 1){
    $pass_token=substr(md5(mt_rand()),0,30);

    $sql="INSERT INTO `resetpass` (`email`,`pass_token`) VALUES ('$email','$pass_token')";
      mysqli_query($conn,$sql);
     header("location:fifth.php");
 
}
else {
    header("location:forgetpass.php");
}


}







?>