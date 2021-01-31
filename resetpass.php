<?php

session_start();

if(!empty($_SESSION['user'])){
    header("location:dashboard.php");
    exit;

}

require_once ("database.php");

$token= $_GET['token'];

if(!empty($token)){



$ctoken="SELECT * FROM `resetpass` WHERE `pass_token`='$token' and `status` = 0";
$tquery=mysqli_query($conn,$ctoken);
if(mysqli_num_rows($tquery)!=1){
    header("location:forgetpass.php");



}
}
else {
    header("location:fifth.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <title>Reset password</title>
    <style>
        .pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 
    </style>
</head>
<body>
    
<div class="container m-auto">
	<div class="row">
		<div class="col-sm-4">
		    
		    <form action="resetpassaction.php" method="post">
            <input type="hidden" name="token" value="<?php echo $_GET['token'];?>">
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" name="password" class="form-control" placeholder="New Password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"> 
            </div> 
            <input type="submit" name="submit" class="btn btn-danger " value="Reset ">
            </form>
		</div>  
	</div>
</div>

<script>
      
$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
</script>
</body>
</html>