<?php
//database connection
require_once('database.php');


//work start

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $ranpass=md5($_POST['password']);

$sql ="INSERT INTO `users`(`fname`,`lname`,`email`,`gender`,`city`,`country`,`password`) VALUES 
('$fname','$lname','$email','$gender','$city','country','$ranpass')";
   

    if(empty($email)){
        echo "Email is required";
        header("location:register.php");
        exit;
    }
    $select= "SELECT * FROM `users` WHERE `email` = '$email'";
    $c_select=mysqli_query($conn,$select);

    if(mysqli_num_rows($c_select) == 1){
        echo "Email Already Used";
        header("location:register.php");
        exit;
    }
 if($password != $cpassword){
     echo "Passoword Doesn't match";
       header("location:register.php");  
       exit;
 }
 mysqli_query($conn , $sql );
 header("location:fifth.php");
 
 

}



?>