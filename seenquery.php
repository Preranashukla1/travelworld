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

 $q = mysqli_query($connection, "update query set   
    seen_status=1  where query_id='{$editid}'") or 
    die(mysqli_error($connection));
    if($q){
        echo "<script>alert('Marked As Checked');window.location='query.php';</script>";
    }

?>