<?php
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/new_user_controller.php');
require_once('../controller/user_level.php');
require_once('../controller/user_level_controller.php');
require_once('../controller/recipe.php');
require_once('../controller/recipe_controller.php');
require_once('../controller/instructions.php');
require_once('../controller/instructions_controller.php');

//confim user is authorized for the page
Security::checkAuthority('user');

$user = NewUserController::getUserByEmail($_SESSION['email']);

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['update'])) {
    //update button pressed for user 
        header('Location: ./user_manage_account.php?uNo=' . $_POST['uNoUpd']);
    unset($_POST['update']);
    unset($_POST['uNoUpd']);
}
if (isset($_POST['about'])) {
    header('Location:./about.php');
}

?>

<html>

<head>
    <title>CIS480 Project</title>
    <link rel="stylesheet" type="text/css" href="css/user.css"/>
</head>

<body>
    <div class="display">
    <h1>Welcome, <?php echo NewUserController::getUserByEmail($_SESSION['email'])->getFirstName(); ?></h1>
        <header>
                <nav>
                <h2>Classic Cuisine`s</h2>
                <form method='POST'>
                    <ul>
                        <input type="hidden" name="uNoUpd"
                            value="<?php echo $user->getUserNo() ?>"/>
                        <input type="submit" value="Update" name="update" />
                        <input type="submit" value="About" name="about">
                        <input type="submit" value="Logout" name="logout">
                    </ul>
                </nav>
        </header>
    <form method="POST">
    <h3>Check out some of Classic Cuisine`s Favorite Recipe`s</h3>
        <table>
            <tr>
                <th>Pizza</th>
                <th>Spaghetti</th>
            </tr>
            <tr>
                <td><a href="./pizza.php"><img src="images/pizza.png"></a></td>
                <td><a href="./spaghetti.php"><img src="images/spag2.jpg"></a></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Garlic Bread</th>
                <th>Buffalo Wings</th>
            </tr>
            <tr>
                <td><a href="./garlic_bread.php"><img src="images/garlicbread.jpg"></a></td>
                <td><a href="./wings.php"><img src="images/wings.jpg"></a></td>
            </tr>
        </table>
    </form>
</body>
</html>