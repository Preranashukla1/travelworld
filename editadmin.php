<?php
session_start();
   //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}

$connection = mysqli_connect("localhost", "root", "","iwt");
$editid = $_GET['id'];
//Fetch Data
$editq = mysqli_query($connection, "select * from admin where admin_id='{$editid}'") or 
die(mysqli_error($connection));
$editrow = mysqli_fetch_array($editq);
//print_r($editrow);

if($_POST){
    $ad_email = $_POST['ad_email'];
     $adpasswd = password_hash($_POST['ad_passwd'], PASSWORD_DEFAULT); //encrypt password
 $ad_phone1 = $_POST['ad_phone1'];
    $ad_phone2 = $_POST['ad_phone2'];
    $role_id = $_POST['role_id'];
    $q = mysqli_query($connection, "update admin set ad_email='{$ad_email}',
    adpasswd='{$adpasswd}',ad_phone1='{$ad_phone1}', ad_phone2= '{$ad_phone2}', role_id = '{$role_id}' where admin_id='{$editid}'") or 
    die(mysqli_error($connection));
    if($q){
        echo "<script>alert('Record Updated');window.location='newad.php';</script>";
    }
}
?>
<html>
    <body>
        <form method="post">
            Email : <input type="email" value="<?php echo $editrow['ad_email'] ?>" name="ad_email"/>
            Password : <input type="password" value=""  name="adpasswd"/>
            Phone_no1 : <input type="tel"  value="<?php echo $editrow['ad_phone1'] ?>" name="ad_phone1"/>
            Phone_no2 : <input type="tel"  value="<?php echo $editrow['ad_phone2'] ?>" name="ad_phone2"/>
            Role Id : <input type="number"  value="<?php echo $editrow['role_id'] ?>" name="role_id"/>
            <input type="submit"/>
        </form>
    </body>
</html>
