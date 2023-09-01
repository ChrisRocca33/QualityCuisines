<?php
session_start();
require_once('../util/security.php');
require_once('../controller/about.php');
require_once('../controller/about_controller.php');
require_once('../controller/user_level.php');
require_once('../controller/user_level_controller.php');
include_once('../model/database.php');

//confim user is authorized for the page
Security::checkAuthority('user');
//$about = AboutController::getAboutByNo(1);

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['home'])) {
    header('Location: ../view/user.php');
}
?>
<html>

<head>
    <title>CIS480 Project</title>
    <link rel="stylesheet" type="text/css" href="css/about.css"/>
</head>

<body>
<form method='POST'>
<div class="display">
    <h1>Classic Cuisine`s</h1>
        <form method='POST'>
            <input type="submit" value="Home" name="home">
            <input type="submit" value="Logout" name="logout">
        </form>
    <br><br>
    <h2>About Classic Cuisine`s</h2>
    <p><?php echo AboutController::getAboutByNo(1)->getAboutText();  ?></p>
    <h2>About Chris Rocca</h2>
    <p><?php echo AboutController::getAboutByNo(2)->getAboutText();  ?></p>
</body>
</html>