<?php
session_start();
require_once('../util/security.php');
require_once('../controller/recipe.php');
require_once('../controller/recipe_controller.php');
require_once('../controller/instructions.php');
require_once('../controller/instructions_controller.php');
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
    <link rel="stylesheet" type="text/css" href="css/garlicbread.css"/>
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
    <h1><?php echo RecipeController::getRecipeByNo(3)->getRecipeName();  ?></h1>
    <img src="../view/images/garlicbread.jpg" class="gBread">
    <h2>Ingredients</h2>
    <p><?php echo RecipeController::getRecipeByNo(3)->getIngredients();  ?></p>
    <h2>Instructions</h2>
    <p><?php echo InstructionsController::getInstructionsByNo(3)->getInsText();  ?></p>
    <p>Try with <a href="../view/spaghetti.php">
            Spaghetti</a></p>
</body>
</html>