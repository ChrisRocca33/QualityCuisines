<?php
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/new_user_controller.php');
require_once('../controller/user_level.php');
require_once('../controller/user_level_controller.php');

//confim user is authorized for the page
Security::checkAuthority('admin');
$user = NewUserController::getUserByEmail($_SESSION['email']);
//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
?>
<html>

<head>
    <title>CIS480 Project</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>

</head>

<body>
    <div class="display">
    <h1>Welcome, <?php echo NewUserController::getUserByEmail($_SESSION['email'])->getFirstName(); ?></h1>
    <h2>Administrator Options</h2>
    <ul>
    <h3><a href="../view/admin_manage_users.php">
            Manage Users</a></h3>
    <h3><a href="../view/admin_recipe_management.php">
            Manage Recipes</a></h3>
    </ul>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>