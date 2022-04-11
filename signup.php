<?php include 'controllers/authController.php' ?>

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


        <form action="signup.php" method="post">
          
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control form-control-lg" value="<?php echo $email; ?>">
          </div>
            
            <div class="form-group">
            <label>Phone No.1</label>
            <input type="tel" required="" name="us_phone1" class="form-control form-control-lg" value="" >
          </div>
          
            <div class="form-group">
            <label>Phone No.2</label>
            <input type="tel" name="us_phone2" class="form-control form-control-lg" value="<?php  ?>" >
          </div>
          
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Password Confirm</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group"><
            <button type="submit" name="signup-btn" class="btn btn-lg btn-block">Sign Up</button>
          </div>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
        <p><a href="usersideindex.php">Cancel</a></p>
      </div>
    </div>
  </div>
</body>
</html>