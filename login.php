<?php

session_start();
//database connection
require_once('database.php');

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(empty($email)){
        header("location:fifth.php");
        exit;

    }

    $cemail="SELECT * FROM `users` WHERE `email` = '$email'";
    
    $equery=mysqli_query($conn,$cemail);

    if(mysqli_num_rows($equery) ==1){

    $rows=mysqli_fetch_assoc($equery);

    if(md5($password)==$rows['password']){
        $_SESSION['user']=$email;
        header("location:dashboard.php");

    }
    else {
        header("location:fifth.php");
    }

    

    }
    else {
       header("location:fifth.php");
    }


}

?>