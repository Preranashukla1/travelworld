<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
   //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}

$connection = mysqli_connect("localhost", "root", "","iwt");

$editid = $_GET['id'];
//Fetch Data
$editq = mysqli_query($connection, "select * from package where tour_id='{$editid}'") or 
die(mysqli_error($connection));
$editrow = mysqli_fetch_array($editq);



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/><!-- comment -->

        <title>Travel World</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    
    <body>
        <?php
        $dbh = new PDO("mysql:host=localhost; dbname=iwt","root","");
        
        if(isset($_POST['btn'])){
            $name = $_FILES['myfile']['name'];
            $type = $_FILES['myfile']['type'];
            //$editid = $_GET['id'];
            $data = file_get_contents($_FILES['myfile']['tmp_name']);
            //$data1 = fopen($data, "rb");
            /*$q12 = mysqli_query($connection, "update package set name='{$name}',type='{$type}',pdf_doc='{$data}'
     where tour_id='{$editid}'") or 
    die(mysqli_error($connection));*/
            //$stmt = $dbh->prepare("update package set name='{$name}',type='{$type}',pdf_doc='{$data}' where tour_id='{$editid}'");
            $stmt = $dbh->prepare("update package set name=:name,type=:type,pdf_doc=:data where tour_id=:id");
            $stmt->bindParam(':id', $editid,PDO::PARAM_INT, 3);
            $stmt->bindParam(':name', $name,PDO::PARAM_STR, 10);
            $stmt->bindParam(':type', $type,PDO::PARAM_STR, 10);
            $stmt->bindParam(':data', $data,PDO::PARAM_LOB);
            
            
            //$stmt->bindParam(1, $name);
            //$stmt->bindParam(2, $type);
            //$stmt->bindParam(3, $data);
            
            //$stmt->execute();
            if($stmt->execute()){

                echo "<script>alert('Record Updated');window.location='package.php';</script>";
                }
                else{
                echo " Not able to add data please contact Admin ";
                print_r($stmt->errorInfo()); 
                }
        }
        
        ?>
   
        
        <form class="bg-light p-5 contact-form" method="post" enctype="multipart/form-data">
            <label> Upload File for Itineary </label>
            <input type="file" class="form-control" required name ="myfile"/>
            <p></p><br/>
            <button class="btn btn-primary py-3 px-5"  name ="btn">Upload</button>
        </form>
    </body>
</html>
