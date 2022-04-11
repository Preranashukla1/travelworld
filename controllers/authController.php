<?php
require_once 'sendEmails.php';
session_start();
$email = "";
$errors = [];
$us_phone1;
$us_phone2;

$conn = new mysqli('localhost', 'root', '', 'iwt');

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password
    $us_phone1 = $_POST['us_phone1'];
    $us_phone2 = $_POST['us_phone2'];

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE us_emailid='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET us_emailid=?, token=?, us_passwd=?, us_phone1=?, us_phone2=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $email, $token, $password, $us_phone1, $us_phone2);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
            sendVerificationEmail($email, $token);

            $_SESSION['id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: usersideindex.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE us_emailid='$email' LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $email, $password);

        
        
        
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['us_passwd'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['user_id'];
                $_SESSION['email'] = $user['us_emailid'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: usersideindex.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}


if (isset($_POST['login-btn1'])) {
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        //$stmt = "SELECT * FROM admin WHERE ad_email='$email'  LIMIT 1";
        
        $stmt1 = mysqli_query($conn, "select * from admin where ad_email='{$email}'") or 
        die(mysqli_error($conn));
        $stmt = mysqli_fetch_array($stmt1);
        echo "{$stmt['ad_email']}";
     
        
            if (stmt1) { // if password matches
              
                $_SESSION['admin_id'] = $stmt['admin_id'];
                $_SESSION['email'] = $stmt['ad_email'];
                $_SESSION['verified'] = $stmt['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: admin.php');
                
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
    