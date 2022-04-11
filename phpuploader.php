<?php

session_start();

   //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}
       
$connection = mysqli_connect("localhost", "root", "","iwt");
    $id = $_GET['id'];
 
                            $q = mysqli_query($connection, "SELECT
                                 *
                            FROM
                                package where tour_id='{$id}' ") or die(mysqli_error($connection));
                            
                            $row = mysqli_fetch_array($q)

?>
<<!doctype html>
<html>
    <embed width="100%" height="100%" src="data:application/pdf; charset=utf8;base64,<?php echo base64_encode($row['pdf_doc']); ?>" />
</html>


