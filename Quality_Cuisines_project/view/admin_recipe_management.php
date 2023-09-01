<?php
session_start();
require_once('../util/security.php');

//confim user is authorized for the page
Security::checkAuthority('admin');

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}

?>
<html>

<head>
    <title>CIS480 Project</title>
</head>

<body>
    <h1>Page Under Construction</h1>
    <h1>Manage Recipes</h1>
    
    <h2><a href="../view/admin.php">
            Home</a></h2>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>