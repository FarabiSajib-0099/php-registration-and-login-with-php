<?php


$conn=mysqli_connect('localhost','root','','advance');

if(!$conn){
    die('mysqli connection error' . mysqli_connect_error());

}

$name = $email = $phone = $password = $cpassword ='';
$ename = $eemail = $ephone = $epassword = $ecpassword ='';

if($_SERVER['REQUEST_METHOD'] =="POST"){
 
    //name validation
    if(empty($_POST['name'])){
    $ename ="Name field is required";

 
    }
    else{
        $name =validation($_POST['name']);
    }
  //email validation
  if(empty($_POST['email'])){
    $eemail ="Email field is required";


    }
    else{
        $email =validation($_POST['email']);
    }
  //ephone validation
  if(empty($_POST['phone'])){
    $ephone ="Phone number field is required";


    }
    else{
        $phone =validation($_POST['phone']);
    }
  //pass validation
  if(empty($_POST['password'])){
    $epassword ="password field is required";


    }
    else{
        $password =validation($_POST['password']);
    }
    if(!empty($_POST['password']) and ($_POST['password'] == $_POST['cpassword'])){
          

        $password =validation($_POST['password']);
        $cpassword= validation($_POST['cpassword']);

        $lenth=strlen($password);
        if($lenth <=8){
         $password="Password must be 8 char needed";
        }
         elseif(!preg_match('#[0-9]+#',$password)){
             $password ="Password must 1 Number  needed";

        }
        elseif(!preg_match('#[A-Z]+#',$password)){
            $password ="Password must One Capital letter  needed";

       }
       elseif(!preg_match('#[a-z]+#',$password)){
        $password ="Password must One Number small letter needed";

   }
       
      
    }
    elseif(empty($_POST['password'])){
        $password="Password Must be Required";

        }
        elseif($_POST['password'] == $_POST['cpassword']){
            $password="Confrim Password doesn't match";
    
            }
            elseif(empty($_POST['cpassword'])){
                $password="Confrim Password Must be Required";
        
                }
            else{
                $password =validation($_POST['password']);
            }
    $sql="INSERT INTO user(name,email,phone,password,date) VALUES ('$name','$email','$phone','$password',now())";
    if(mysqli_query($conn,$sql)){
        echo "Connection Success";
    }
    else{
        echo "Error";
    }
}
    function validation($data){
        $data = trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



?>