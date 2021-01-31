<?php
session_start();
if(empty($_SESSION['user'])){
    header("location:fifth.php");
}

require_once('database.php');
$user="SELECT * FROM `users`";
$query=mysqli_query($conn,$user);
$user_info=mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

  
  <body class="bg-dark">
  

<div class="container">
<h1 style="text-align:center">Welcome <?php echo $user_info['fname']. " " .$user_info['lname'];?></h1>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#SL</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">City</th>
      <th scope="col">Country</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php if(mysqli_num_rows($query) !=0){

      $i=1;
       while($user_info=mysqli_fetch_assoc($query)){?>
    <tr>
      <td scope="row"> <?php echo $i; ?> </td>
      <td> <?php echo $user_info['fname'] .$user_info['lname'];?></td>
      <td> <?php echo $user_info['email'];?></td>
      <td> <?php echo $user_info['gender'];?></td>
      <td> <?php echo $user_info['city'];?></th>
      <td> <?php echo $user_info['country'];?></td>
      <td> <?php echo $user_info['date'];?></td>
      <td><a class="btn btn-danger" href="delete.php?id=<?php echo  $user_info['id'];?>">Delete</a>
      <a class="btn btn-info" href="view.php?id=<?php echo  $user_info['id'];?>">View</a>
    
    </td>
    </tr>
   <?php $i++; } } ?>
    
  </tbody>
</table>
 
 <a href="logout.php" class="btn btn-lg btn-primary">Log Out</a>
</div> 
<!--container end.//-->

















    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
 
  </body>
</html>
