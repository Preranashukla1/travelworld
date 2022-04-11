<?php
   //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}

$connection = mysqli_connect("localhost", "root", "", "iwt");

$deleteid = $_GET['id'];

$q = mysqli_query($connection, "delete from users where user_id= '{$deleteid}'") or die(mysqli_error($connection));

if($q){
    echo "<script>alert('record deleted');window.location='user.php';</script>";
}

