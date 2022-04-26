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
<<!DOCTYPE html>
<html>
    
    <head>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <a href='destination.php' class="align-self-stretch form-control btn btn-primary p-0" style='padding:10px 10px 10px 5px;'>Back</a>
    <embed width="100%" height="100%" src="data:application/pdf; charset=utf8;base64,<?php echo base64_encode($row['pdf_doc']); ?>" />
     
							
</html>


