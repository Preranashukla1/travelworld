<?php
 session_start();
    
 
   $connection = mysqli_connect("localhost", "root", "","iwt");
   
   if(!isset($_SESSION['id'])){
   header("location:login.php");}
   else{}
   
   $hotelid = $_GET['hotelid'];
   
   $q = mysqli_query($connection, "SELECT * FROM `hotels` WHERE hotel_id='{$hotelid}'") or die(mysqli_error($connection));
   $row = mysqli_fetch_array($q);
   
   if($_POST){
   $Hotel_name= $_POST['Hotel_name'];
   $check_in =$_POST['check_in'];
   $check_out =$_POST['check_out'];
   $room =$_POST['no_room'];
   $dest = $row['hdes_country']; 
   $rate= $row['charges_per_night']*$room;
   
   $q1 = mysqli_query($connection, "insert into `booking`(user_id, check_in, check_out, destination, rate_hotel, hotel_id,room_total,date_of_book
         )
            values('{$_SESSION['id']}','{$check_in}','{$check_out}','{$dest}', '{$rate}',
             '{$hotelid}','$room',now())") or 
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

</head>

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
								<input class="form-control" type="text" placeholder="Hotel..." value="<?php echo "{$row['hotel_name']}"; ?>" name='Hotel_name'>
								<span class="form-label">Hotel Name</span>
							</div>
                                                <div class="form-group">
								Price: <input class="form-control" type="text" placeholder="Hotel..." value="<?php echo "{$row['charges_per_night']}"; ?>" name='Hotel_name'>
								<span class="form-label">Charges On per night basis</span>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
                                                                            <input class="form-control" type="date" required name="check_in">
										<span class="form-label">Check In</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
                                                                            <input class="form-control" type="date" required name="check_out">
										<span class="form-label">Check out</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
                                                                            <input class="form-control" type="number" required placeholder="No of Room" name="no_room">
										<span class="form-label">Room</span>
									</div>
                                                                </div>
								
							</div>
                                                
                                                	
                                                        <div class="row">
                                                        <div class="col-md-6">
							<div class="form-btn">
                                                            <input class="submit-btn" type="Submit" style="border-radius: 100px; background-color: white; 
                                                                   font-size: 22px;" value="Book Now">
							</div>
                                                        </div>
                                                            
                                                        <div class="col-md-6">
							<div class="form-btn">
                                                            <a href="hoteluser.php" class="submit-btn" type="Submit" style="border-radius: 100px; background-color: white; 
                                                                   font-size: 22px; padding-left:25px; padding-right: 25px;  ">Cancel</a>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>