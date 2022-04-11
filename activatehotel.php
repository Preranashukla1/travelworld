<?php
session_start();


    //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}
$connection = mysqli_connect("localhost", "root", "","iwt");
$editid = $_GET['id'];
$editadid = $_SESSION['admin_id'];
//Fetch Data
$editq = mysqli_query($connection, "select * from admin where admin_id='{$editid}'") or 
die(mysqli_error($connection));
$editrow = mysqli_fetch_array($editq);
//print_r($editrow);

 $q = mysqli_query($connection, "update hotels set  activehotel=1  where hotel_id='{$editid}'") or 
    die(mysqli_error($connection));
    if($q){
        echo "<script>alert('Marked As Activated');window.location='hotels.php';</script>";
    }

?>