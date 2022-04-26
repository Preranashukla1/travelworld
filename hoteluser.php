<?php

if($_POST){
    
    if($searchvalue){
        header("location:searchedvaluehotel.php?seacrhvalue={$searchvalue}");
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travel World Hotels</title>
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
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li><ul class="nav navbar-top-links navbar-right">
                                            <div class="dropdown">
                                            <button class="dropbtn">Dropdown</button>
                                            <div class="dropdown-content">
                                              <a href="newfeeduser.php">Latest Feedbacks</a>
                                              <a href="bestfeeduser.php">Best Feedbacks</a>
                                              <a href="negfeeduser.php">Categorising Feedbacks</a>
                                            </div>
                                          </div>
                                        
                                        
                                        <div class="dropdown">
                                            <button class="dropbtn"><i class="fa fa-user"></i><i class="fa fa-caret-down"></i></button>
                                            <div class="dropdown-content">
                                                <a href="login.php">Login as User</a>
                                                <a href="loginadmin.php">Login as User</a>
                                                <a href="signup.php">Signup as User</a>
                                                <a href="logout.php">Logout</a>
                                            </div>
                                          </div>
                                        
                
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
          <p class="breadcrumbs"><span class="mr-2"><a href="usersideindex.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Hotel</h1>
     </div>
   </div>
 </div>
</section>
 
 <a href="userbooklist.php" type="submit" value="User Book List"  class="align-self-stretch form-control btn btn-primary p-0" >User Book List</a>

<section class="ftco-section ftco-no-pb">
 <div class="container">
  <div class="row">
   <div class="col-md-12">
    <div class="search-wrap-1 ftco-animate">
     
									            
        <form method="post" action="usersideindex.php">
												
	<label for="#">Hotel</label>
	<input type="text" class="form-control" placeholder="Search place" name ="searchvalue" >
        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary p-0">   
        </form>
										
</div>
</div>
</div>
</div>
</section>

<section class="ftco-section">
    
 <div class="container container-2">
  <div class="row">
      
      
      
       <?php
                                    $connection = mysqli_connect("localhost", "root", "","iwt");
                                    
                                    $editq2 = mysqli_query($connection, "select * from hotels where activehotel = 1") or 
                                        die(mysqli_error($connection)); 

                                    
                                   
                                    while($editrow2 = mysqli_fetch_array($editq2)){
                                        
                                        
					echo "<div class='col-md-4 ftco-animate'>";
                                        echo "<div class='project-wrap hotel'>";?>
                                        
                                          <a href='#' class='img' style='background-image: url("data:image/jpg;charset=utf8;base64,<?php echo base64_encode($editrow2['himage']); ?>"); '>
                				<?php
                                          echo "<span class='price'>\${$editrow2['charges_per_night']}  /person</span>";
                                        echo "</a>";
                                        echo "<div class='text p-4'>";
                                          
                                          echo "<span class='days'>Per Day </span>";
                                          echo "<h3><a href='#'>{$editrow2['hotel_name']}</a></h3>";
                                          echo "<p class='location'><span class='fa fa-map-marker'></span> {$editrow2['hdes_country']}, {$editrow2['hdes_state']}, {$editrow2['hdes_city']}</p>";
                                          echo "<ul>";
                                           echo "<li><span class='flaticon-shower'></span>2</li>";
                                           echo "<li><span class='flaticon-king-size'></span>3</li>";
                                           echo "<li><span class='flaticon-mountains'></span>{$editrow2['hhighlights']}</li>";
                                         echo "</ul>";
                                         
                                                        echo "<a href='hotel_booking.php?hotelid={$editrow2['hotel_id']}' class='btn btn-primary ' style='padding:0px 0px 0px 5px;'>Book It Now</a>";
                                       echo "</div>";
                                     echo "</div>";
                                    echo "</div>";
                                    
                                                            
                                    }
                                    
                                    ?>
                                    
    </div></div>
   
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

/* Dropdown Button */
.dropbtn {
  background-color: transparent;
  color: white;
  padding: 24px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: orangered;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: transparent;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: transparent}
</style>


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

</body>
</html>