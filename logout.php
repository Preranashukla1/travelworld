<?php
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['verify']);
unset($_SESSION['admin_id']);
header("location: usersideindex.php");