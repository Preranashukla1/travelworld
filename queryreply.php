<?php include 'controllers/authController.php' ?>
<?php

   //Auth
/*if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}*/ 
$connection = mysqli_connect("localhost", "root", "","iwt");



$connection = mysqli_connect("localhost", "root", "","iwt");
$editid = $_GET['id'];
//Fetch Data
$editq = mysqli_query($connection, "select * from query where query_id='{$editid}'") or 
die(mysqli_error($connection));
$editrow = mysqli_fetch_array($editq);
//print_r($editrow);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <style>
      @import url('https://fonts.googleapis.com/css?family=Lora');
li { list-style-type: none; }
.form-wrapper {
  margin: 50px auto 50px;
  font-family: 'Lora', serif;
  font-size: 1.09em;
}
.form-wrapper.login { margin-top: 120px; }
.form-wrapper p { font-size: .8em; text-align: center; }
.form-control:focus { box-shadow: none; }
.form-wrapper {
  border: 1px solid #80CED7;
  border-radius: 5px;
  padding: 25px 15px 0px 15px;
}
.form-wrapper.auth .form-title { color: #007EA7; }
.home-wrapper button,
.form-wrapper.auth button {
  background: #007EA7;
  color: white;
}
.home-wrapper {
  margin-top: 150px;
  border-radius: 5px;
  padding: 10px;
  border: 1px solid #80CED7;
}
  </style>
  <title>User verification system PHP</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth">
          
          <!-- form title -->
<h3 class="text-center form-title">Register</h3> <!-- or Login -->

<?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>


<form method="post" action="queryreply.php">
						<div class="form-group" >
							<label>Enter Name</label>
							<input type="text" name="name" placeholder="Enter Name" class="form-control"  />
						</div>
						<div class="form-group">
							<label>Enter Email</label>
							<input type="text" name="email" class="form-control" placeholder="Enter Email"  value="<?php echo $editrow['emailid'] ?>"/>
						</div>
						<div class="form-group">
							<label>Enter Subject</label>
                                                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required value="Your Query: <?php echo $editrow['qinfo'] ?>"  />
						</div>
						<div class="form-group">
							<label>Enter Message</label>
							<textarea name="message" class="form-control" placeholder="Enter Message" required></textarea>
						</div>
						<button type="submit" name="queryreply" class="btn btn-lg btn-block">Send Reply</button>
                                                <p><a href="query.php">Cancel</a></p>
					</form>
      </div>
    </div>
  </div>
</body>
</html>