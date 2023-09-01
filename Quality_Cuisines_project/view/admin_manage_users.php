<?php
require_once('../controller/user.php');
require_once('../controller/new_user_controller.php');
require_once('../controller/user_level.php');
require_once('../controller/user_level_controller.php');
session_start();
require_once('../util/security.php');

//confim user is authorized for the page
Security::checkAuthority('admin');

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}

if (isset($_POST['update'])) {
    //update button pressed for user
    if(isset($_POST['uNoUpd'])) {
        header('Location: ./admin_add_update_user.php?uNo=' . $_POST['uNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['uNoUpd']);
}

if (isset($_POST['delete'])) {
    //delete button pressed for a user
    if(isset($_POST['uNoDel'])) {
        NewUserController::deleteUser($_POST['uNoDel']);
    }
    unset($_POST['delete']);
    unset($_POST['uNoDel']);
}
?>
<html>

<head>
    <title>CIS480 Project</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>

<body>
    <div class="display">
    <header>
    <h1>Classic Cuisine`s</h1>
        <nav>
            <ul class="nav_links">
                <li><a href="../view/admin.php">Home</a></li>
                <li><a href="./admin_add_update_user.php">Add User</a>
            </ul>
        </nav>
        <form method='POST'>
            <input type="submit" value="Logout" name="logout">
        </form>
    </header>
    <h2>All Users</h2>
    <table>
        <tr>
            <th>EMail Address</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Level</th>
        </tr>
        <?php foreach(NewUserController::getAllUsers() as $user) :?>
        <tr>
            <td><?php echo $user->getEMail(); ?></td>
            <td><?php echo $user->getFirstName(); ?></td>
            <td><?php echo $user->getLastName(); ?></td>
            <td><?php echo $user->getUserLevel()->getLevelName(); ?></td>
            <td><form method="POST">
                <input type="hidden" name="uNoUpd"
                    value="<?php echo $user->getUserNo() ?>"/>
                <input type="submit" value="Update" name="update" />
            </form></td>
            <td><form method="POST">
                <input type="hidden" name="uNoDel"
                    value="<?php echo $user->getUserNo() ?>"/>
                <input type="submit" value="Delete" name="delete" />
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>