<?php

session_start();
require_once("database.php");
if($_SESSION['user']==NULL){
    header("location:fifth.php");
    exit;
}

if($_GET['id']==NULL){
    header("location:dashboard.php");
   

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <?php
    $id=$_GET['id'];
    $sql="SELECT * FROM `users` WHERE `id` ='$id'";
    $query=mysqli_query($conn,$sql);
    $user= mysqli_fetch_assoc($query);
    ?>
    <?php
    echo "Name:". $user['fname'] .' '. $user['lname'].'</br>'. 
         "Email:".$user['email'];
    ?>
     <a href="logout.php" class="btn btn-lg btn-primary">Log Out</a>
</body>
</html>