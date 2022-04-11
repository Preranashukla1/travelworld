<?php
session_start();
   //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}

$connection = mysqli_connect("localhost", "root", "","iwt");
$editid = $_GET['id'];
//Fetch Data
$editq = mysqli_query($connection, "select * from roles where role_id='{$editid}'") or 
die(mysqli_error($connection));
$editrow = mysqli_fetch_array($editq);
//print_r($editrow);

if($_POST){
    $role_name = $_POST['role_name'];
      $q = mysqli_query($connection, "update roles set role_name='{$role_name}' where role_id='{$editid}'") or 
    die(mysqli_error($connection));
    if($q){
        echo "<script>alert('Record Updated');window.location='roles.php';</script>";
    }
}
?>
<html>
    <body>
        <form method="post">
            Role Name : <input type="role_name" value="<?php echo $editrow['role_name'] ?>" name="role_name"/>
            <input type="submit"/>
        </form>
    </body>
</html>
