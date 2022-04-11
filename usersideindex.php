<?php
session_start();
$connection = mysqli_connect("localhost", "root", "","iwt");

//Fetch Data
$editq1 = mysqli_query($connection, "select * from feedback") or 
die(mysqli_error($connection));
$editrow1 = mysqli_fetch_array($editq1);
//print_r($editrow);
 

if($_POST){
 
    $feedback = $_POST['feedback'];
    $content = $_POST['content'];
    $emailid = $_POST['emailid'];
    $date = date('m/d/Y', time());
    
    $searchedvaluepack = $_POST['searchedvaluepack'];
    $searchvalue = $_POST['searchvalue'];
    
    $q = mysqli_query($connection, "insert into feedback(frate, comment, email_id,fdate,ftime)
values('{$feedback}','{$content}','{$emailid}',now(),now())") or 
    die(mysqli_error($connection));
    if($q){
        echo "<script>alert('Record Updated');window.location='usersideindex.php';</script>";
    }
    
    if($searchedvaluepack){
        header("location:searchedvaluepack.php?seachedvaluepack={$searchedvaluepack}");
   
    }
    
    
    if($searchvalue){
        header("location:searchedvaluehotel.php?seacrhvalue={$searchvalue}");
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Travel World Tour</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"><!-- comment -->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"><!-- comment -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
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
                    <a class="navbar-brand" href="usersideindex.php">Travel World<span>Travel Agency</span></a>
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
                                </li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
	
	<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
				<div class="col-md-7 ftco-animate">
					<span class="subheading">Welcome to Travel World</span>
					<h1 class="mb-4">Discover Your Favorite Place with Us</h1>
					<p class="caps">Travel to the any corner of the world, without going around in circles</p>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ftco-search d-flex justify-content-center">
						<div class="row">
							<div class="col-md-12 nav-link-wrap">
								<div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search Tour</a>

									<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>

								</div>
							</div>
							<div class="col-md-12 tab-wrap">
								
								<div class="tab-content" id="v-pills-tabContent">

									<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
										            <form method="post" action="usersideindex.php">
												
														<label for="#">Destination</label>
																	<input type="text" class="form-control" placeholder="Search place" name ="searchedvaluepack" >
                                                                                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary p-0">   
                                                                                                                        
   
												
										</form>
									</div>

									<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
										            
                                                                                           <form method="post" action="usersideindex.php">
												
														<label for="#">Hotel</label>
																	<input type="text" class="form-control" placeholder="Search place" name ="searchvalue" >
                                                                                                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary p-0">   
                                                                                                                        
   
												
										</form>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section services-section">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
						<div class="w-100">
							<span class="subheading">Welcome to Travel World</span>
							<h2 class="mb-4">It's time to start your adventure</h2>
							<p>Our broad contact network enables to set up exceptional educational and special interest programs.
                                                            Universities, museums, associations, and tour operators trust Travel World to design and operate 
                                                            their unique organization sponsored programs and events. Glad To have the platform to work with you.</p>
							<p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-1 d-block img" style="background-image: url(images/services-1.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-paragliding"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Activities</h3>
										<p>While Journey various activities like dancing, music, playing sports, campfire and many more are planned to let you enjoy.</p>
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-2 d-block img" style="background-image: url(images/services-2.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Travel Arrangements</h3>
										<p>Supported travel arrangements done so that no worries for you.</p>
									</div>
								</div>    
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-3 d-block img" style="background-image: url(images/services-3.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tour-guide"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Private Guide</h3>
										<p>For each tour we have a person who have information of place and can guide you well so as to be away from confusion.</p>
									</div>
								</div>      
							</div>
							<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
								<div class="services services-1 color-4 d-block img" style="background-image: url(images/services-4.jpg);">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-map"></span></div>
									<div class="media-body">
										<h3 class="heading mb-3">Location Manager</h3>
										<p>Avails you with perfect locations.</p>
									</div>
								</div>      
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section img ftco-select-destination" style="background-image: url(images/bg_3.jpg);">
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<span class="subheading">Pacific Provide Places</span>
						<h2 class="mb-4">Select Your Destination</h2>
					</div>
				</div>
			</div>
			<div class="container container-2">
				<div class="row">
					<div class="col-md-12">
						<div class="carousel-destination owl-carousel ftco-animate">
                                                            
                                                            <?php 
                                                            
                                                            $connection = mysqli_connect("localhost", "root", "","iwt");
 
                                                            $q = mysqli_query($connection, "SELECT DISTINCT
                                                                `package`.`des_country`

                                                            FROM
                                                                `package` ") or die(mysqli_error($connection));
                            
                                                            while($row = mysqli_fetch_array($q)){
                                                               
                                                                echo '<div class="item">';
								echo '<div class="project-destination">';
                                                                        echo "<a href='searchedvaluepack.php?seachedvaluepack={$row['des_country']}' class='img' style='background-image: url(https://source.unsplash.com/500x300/?{$row['des_country']});'>";
										echo '<div class="text">';
											echo "<h3>{$row["des_country"]}</h3>";
											echo '<span>4-5 Tours</span>';
										echo '</div>';
									echo '</a>';
								echo '</div>';
							echo '</div>';
                                                            }
                                                            
                                                            ?>
								
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<span class="subheading">Destination</span>
						<h2 class="mb-4">Tour Destination</h2>
					</div>
				</div>
				<div class="row">
					
						
                                            <?php
                                    $connection = mysqli_connect("localhost", "root", "","iwt");
                                    
                                    $editq2 = mysqli_query($connection, "select * from package LIMIT 6") or 
                                        die(mysqli_error($connection)); 

                                    
                                   
                                    while($editrow2 = mysqli_fetch_array($editq2)){
                                        
                                        
					echo '<div class="col-md-4 ftco-animate">';
						echo '<div class="project-wrap">';?>
                                                <a href='#' class='img' style='background-image: url("data:image/jpg;charset=utf8;base64,<?php echo base64_encode($editrow2['image']); ?>"); '>
                						
                                                    <?php
                                                    //echo "<a href='#' class='img' style='background-image:'data:image/jpg;charset=utf8;base64,base64_encode($editrow2['image'])';'>";
								echo "<span class='price'>Rs.{$editrow2['charge_per_person']}  /person</span>";
							echo '</a>';
                                                       
							echo '<div class="text p-4">';
                                                                echo "<span class='days'>{$editrow2['days_stay']} Days Tour</span>";
								echo "<h3><a href='#'>{$editrow2['pack_name']}</a></h3>";
                                                                echo "<p class='location'><span class='fa fa-map-marker'></span> {$editrow2['des_country']}, {$editrow2['des_state']}, {$editrow2['des_city']}</p>";
								echo '<ul>';
                                                                        echo "<li><span class='flaticon-king-size'></span>{$editrow2['days_stay']}</li>";
									echo "<li><span class='flaticon-king-size'></span>{$editrow2['night_stay']}</li>";echo "<p></p>";
									echo "<li><span class='flaticon-sun-umbrella'></span>{$editrow2['highlights']}</li>";
								echo '</ul>';
							echo '</div>';
                                                        //echo "<td><a href='activatepack.php?id={$row['tour_id']}, admin_id = {$_SESSION['admin_id']}'>Activate</a></td>";
    
                                                        echo "<a href='pack_booking.php?tour_id={$editrow2['tour_id']}' class='btn btn-primary ' style='padding:0px 0px 0px 5px;'>Book It Now</a>";
						echo '</div>';
					echo '</div>';
                                       
					
                                    }
                                                  
                                    echo "<a href='destination.php' class='btn btn-primary ' style='padding:0px 0px 0px 5px;'>For More</a>";
                                    
                                    
                                    ?>
                                    
                                            
					</div>
				</div>
			</div>
		</section>
		
		<section class="ftco-section ftco-about img"style="background-image: url(images/bg_4.jpg);">
			<div class="overlay"></div>
			<div class="container py-md-5">
				<div class="row py-md-5">
					
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-about ftco-no-pt img">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-12 about-intro">
						<div class="row">
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="img d-flex w-100 align-items-center justify-content-center" style="background-image:url(images/about-1.jpg);">
								</div>
							</div>
							<div class="col-md-6 pl-md-5 py-5">
								<div class="row justify-content-start pb-3">
									<div class="col-md-12 heading-section ftco-animate">
										<span class="subheading">About Us</span>
										<h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
										<p>We the Travel World are always with you, for you and made from you. You inspire us and we try best to make
                                                                                your tour memorable and you like to engage with us.</p>
										<p><a href="#" class="btn btn-primary">Book Your Destination</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center pb-4">
					<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
						<span class="subheading">Testimonial</span>
						<h2 class="mb-4">Tourist Feedback</h2>
					</div>
				</div>
				<div class="row ftco-animate">
					<div class="col-md-12" >
						<div class="carousel-testimony owl-carousel" >
                                                    
                                                    <?php 
                                                            
                                                            $connection = mysqli_connect("localhost", "root", "","iwt");
                                    
                                                            $editquery = mysqli_query($connection, "select * from feedback") or 
                                                                die(mysqli_error($connection));

                                                            while( $rowfeed = mysqli_fetch_array($editquery)){
                                                               
                                                                echo '<div class="item">';
								echo '<div class="testimony-wrap py-4">';
                                                                        echo '<div class="text">
										<p class="star">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</p>';?>
                                                    <p class="mb-4" style=" height: 150px; padding: 10px 10px 10px 10px " > <?php
                                                                                if($rowfeed['comment'] !== ""){
                                                                                    echo "{$rowfeed['comment']}";}?></p>
                                                                                <?php 
                                                                                echo '<div class="d-flex align-items-center" style:>
											<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
											<div class="pl-3">
												<p class="name">Roger Scott</p>
												<span class="position">Marketing Manager</span>
											</div>';
											
										echo '</div>';
                                                                                echo '</div>';
								echo '</div>';
							echo '</div>';
                                                            }
                                                            
                                                            ?>
						</div>
					</div>
				</div>
			</div>
		</section>


		
		<section class="ftco-intro ftco-section ftco-no-pt">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 text-center">
						<div class="img"  style="background-image: url(images/bg_2.jpg);">
							<div class="overlay"></div>
							<h2>We Are Travel World A Travel Agency</h2>
							<p>We can manage your dream building and memories.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
        
                     <!--Modal Launch Button-->
<button type="button" class="btn btn-info btn-lg openmodal" data-toggle="modal" data-target="#myModal">Give Feedback</button>
<!--Division for Modal-->
<form action='usersideindex.php' method="post" >
<div id="myModal" class="modal fade" role="dialog">
    <!--Modal-->
    <div class="modal-dialog">
        <!--Modal Content-->
        <div class="modal-content">
            <!-- Modal Header-->
            <div class="modal-header">
                <h3>Feedback Request</h3>
                <!--Close/Cross Button--> <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
            </div> <!-- Modal Body-->
            <div class="modal-body text-center"> <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1"></i>
                <h3>Your opinion matters</h3>
                <h5>Help us improve our productivity? <strong>Give us your feedback.</strong></h5>
                <hr>
                <h6>Your Rating</h6>
            </div> <!-- Radio Buttons for Rating-->
            <div class="form-check mb-4"> <input name="feedback" type="radio" value="3"> <label class="ml-3">Very good</label> </div>
            <div class="form-check mb-4"> <input name="feedback" type="radio" value="2"> <label class="ml-3">Good</label> </div>
            <div class="form-check mb-4"> <input name="feedback" type="radio" value = "1"> <label class="ml-3">Bad</label> </div>
            <!--Text Message-->
            <div class="text-center">
                <h4>What could we improve?</h4>
            </div> <textarea type="textarea" placeholder="Your Message" rows="3" name = 'content'></textarea> <!-- Modal Footer-->
            
            <h4> Email Id </h4>
            <input type="email" placeholder="Your Email Id" name = 'emailid'/>
            <div class="modal-footer"> <input type="submit" value="Submit" class="btn1 btn-dark">
                    <a href="" class="btn btn-outline-primary" data-dismiss="modal">Cancel</a> </div>
        </div>
    </div>
</div>
</form>
    
     

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
							<h2 class="ftco-heading-2">Information</h2>
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
			
			

			<!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


			<script src="js/jquery.min.js"></script>
			<script src="js/jquery-migrate-3.0.1.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/jquery.easing.1.3.js"></script>
			<script src="js/jquery.waypoints.min.js"></script>
			<script src="js/jquery.stellar.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/jquery.animateNumber.min.js"></script>
			<script src="js/bootstrap-datepicker.js"></script>
			<script src="js/scrollax.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
			<script src="js/google-map.js"></script>
			<script src="js/main.js"></script>
			
                        
                        
           

<style>
    .modal-dialog {
    height: 50%;
    width: 50%;
    margin: auto
}

.modal-header {
    color: white;
    background-color: #007bff
}

textarea {
    border: none;
    box-shadow: none !important;
    -webkit-appearance: none;
    outline: 0px !important
}

.openmodal {
    margin-left: 35%;
    width: 25%;
}

.icon1 {
    color: #007bff
}

a {
    margin: auto
}

input {
    color: #007bff
}
</style>
		</body>
                
		</html>