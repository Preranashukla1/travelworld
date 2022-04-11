<?php
 session_start();
   
   $connection = mysqli_connect("localhost", "root", "","iwt");
   
   if(!isset($_SESSION['id'])){
   header("location:login.php");}
   else{}
   
   $tourid = $_GET['tour_id'];
   
   
   $q = mysqli_query($connection, "SELECT * FROM `package` WHERE tour_id ='$tourid'") or die(mysqli_error($connection));
   $row = mysqli_fetch_array($q);
   
   if($_POST){
   $check_in =$_POST['check_in'];
   $check_out1 = strtotime("+{$row['days_stay']} day", strtotime($_POST['check_in']));
   $check_out =  date("Y-m-d", $check_out1);
   $person =$_POST['no_person'];
   $dest = $row['destination'];
   $rate= $row['charge_per_person'] * $person;
   
   $q1 = mysqli_query($connection, "insert into `booking`(user_id,check_in, check_out, destination, rate_tour,total_persons, tour_id     )
            values('{$_SESSION['id']}' ,'{$check_in}','{$check_out}','{$dest}', '{$rate}',
            '{$person}', '$tourid')") or 
    die(mysqli_error($connection));
   if($q1){
        echo "<script>alert('Record Updated');window.location='usersideindex.php';</script>";
    }
 
   }
   //}
     
           
           


   
                            ?>
                            
<!DOCTYPE html>
<html lang="en">

<head>
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
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
     <a class="navbar-brand" href="index.html">Travel World<span>Travel Agency</span></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="oi oi-menu"></span> Menu
     </button>

     <div class="collapse navbar-collapse" id="ftco-nav">
       <ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="usersideindex.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item"><a href="destination.php" class="nav-link">Destination</a></li>
					<li class="nav-item"><a href="hoteluser.php" class="nav-link">Hotel</a></li>
					<li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                                        <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="login.php"><i class="fa fa-user fa-fw"></i> Login as User</a>
                        </li>
                        <li><a href="loginadmin.php"><i class="fa fa-user fa-fw"></i> Login as Admin</a>
                        </li>
                        <li><a href="signup.php"><i class="fa fa-user fa-fw"></i> Signup as User</a>
                        </li>
                        <li><a href="logout.php"><i class="fa fa-user fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
       </ul>
     </div>
   </div>
 </nav>
 <!-- END nav -->
 
 <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="usersideindex.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact us <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Contact us</h1>
     </div>
   </div>
 </div>
</section>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Make your reservation</h1>
						</div>
                                            <form method="post">
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Package..." value="<?php echo "{$row['pack_name']}"; ?>" name='package_name'>
								<span class="form-label">Package Name</span>
							</div>
                                                
                                                <div class="form-group">
								<input class="form-control" type="text" placeholder="Package..." value="<?php echo "{$row['charge_per_person']}"; ?>" name='package_name'>
								<span class="form-label">Charge Per Person basis</span>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
                                                                            <input class="form-control" type="date" required name="check_in">
										<span class="form-label">Check In</span>
									</div>
								</div>

							</div>
							<div class="row">
                                                                <div class="col-md-6">
									<div class="form-group">
                                                                            <input class="form-control" type="number" placeholder="No of Person" name="no_person">
										<span class="form-label">Persons</span>
									</div>
                                                                </div>
								
							</div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                        
                                                                <div class="form-btn" >
                                                            <input class="submit-btn" style="border-radius: 100px; background-color: white; 
                                                                   font-size: 22px;" type="Submit" value="Book Now">
							</div>
                                                            </div>
                                                            
                                                            
                                                                                                               <div class="col-md-6">
							<div class="form-btn">
                                                            <a href="hoteluser.php" class="submit-btn" type="Submit" style="border-radius: 100px; background-color: white; 
                                                                   font-size: 22px; padding-left:25px; padding-right: 25px;  ">Cancel</a>
							</div>
                                                        </div>
                                                        </div>
                                                        </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>
        
		<footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">About</h2>
							<p>Make your Travel more Beautiful, Peaceful Memoryful With Us.</p>
							<ul class="ftco-footer-social list-unstyled float-md-left float-lft">
								<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
							<h2 class="ftco-heading-2">Infromation</h2>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
								<li><a href="#" class="py-2 d-block">General Enquiries</a></li>
								<li><a href="#" class="py-2 d-block">Call Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Experience</h2>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">Adventure</a></li>
								<li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
								<li><a href="#" class="py-2 d-block">Beach</a></li>
								<li><a href="#" class="py-2 d-block">Nature</a></li>
								<li><a href="#" class="py-2 d-block">Camping</a></li>
								<li><a href="#" class="py-2 d-block">Party</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Have a Questions?</h2>
							<div class="block-23 mb-3">
								<ul>
									<li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
									<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
									<li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">newbeginningtorockon@gmail.com</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">

						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by Travel World
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
			</footer>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>