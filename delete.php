<?php
session_start();
if($_SESSION['user']==NULL){
    header("location:fifth.php");
    exit;
}
require_once("database.php");
if($_GET['id']==NULL){
    header("location:dashboard.php");
    exit;
}

$id=$_GET['id'];
$dsql="DELETE FROM `users` WHERE `id`='$id'";
$dquery=mysqli_query($conn,$dsql);

header("location:dashboard.php");




?>