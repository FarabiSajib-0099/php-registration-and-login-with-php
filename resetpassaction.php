<?php
require_once("database.php");

if(isset($_POST['submit'])){
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $upassword=md5($_POST['password']);
    $token=$_POST['token'];
    if($password != $cpassword){
        header("location:resetpass.php?token=".$token);
        exit;
    }

    $sql="SELECT * FROM `resetpass` WHERE `pass_token` = '$token'";

    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)==1){


    $rows=mysqli_fetch_assoc($query);
    $email=$rows['email'];
    $supdate="UPDATE `resetpass` SET `status` = 1  WHERE `email` ='$email'";
    $squery=mysqli_query($conn,$supdate);

    $update="UPDATE `users` SET `password` ='$upassword' WHERE `email` ='$email'";
    $uquery=mysqli_query($conn,$update);
    if($uquery){
        header("location:fifth.php");
    }
else {
    header("location:resetpass.php?token=".$token);
    exit;
}
    

   }else{
       header("location:fifth.php");
   }
  




}


?>