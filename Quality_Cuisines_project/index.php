<?php

session_start();
require_once('controller/user.php');
require_once('controller/user_controller.php');
require_once('util/security.php');

Security::checkHTTPS();

//set the message related to the login/logout functionality
$login_msg = isset($_SESSION['logout_msg']) ?
    $_SESSION['logout_msg'] : '';

if (isset($_POST['email']) & isset($_POST['pw'])) {
    //login and password fields were set
    $user_level = UserController::validUser(
        $_POST['email'], $_POST['pw']);

    if ($user_level === '1') {
        $_SESSION['admin'] = true;
        $_SESSION['user'] = false;
        $_SESSION['email'] = $_POST['email'];
        header("Location: view/admin.php");
  
    }  else if($user_level === '2') {
        $_SESSION['admin'] = false;
        $_SESSION['user'] = true;
        $_SESSION['email'] = $_POST['email'];
        header("Location: view/user.php");
    } else {
        $login_msg = 'Login Failed - Try Again';
    }
}

?>
<html>

<head>
    <title>CIS480 Project</title>
    <link rel="stylesheet" type="text/css" href="view/css/login.css">
</head>

<body>
    <div class="loginbox">
        <img src="view/images/avatar.png" class="avatar">
    <form method='POST'>
        <h1>Sign In</h1>
        <br>
        <p>Username (E-Mail): </p>
        <input type="text" name="email" placeholder="Enter Username">
        <p>Password: </p>
        <input type="password" name="pw" placeholder="Enter Password">
        <input type="submit" value="Login" name="login">
        <a href="view/register.php">Create New Account</a>
        <br>
        <br>
        <h2><?php echo $login_msg; ?></h2>
        <br>
        <h3>Created by</h3>
        <h3>Chris Rocca</h3>

    </form>
</body>
</html>