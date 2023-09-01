<?php
require_once('../controller/user.php');
require_once('../controller/new_user_controller.php');
require_once('../controller/user_level.php');
require_once('../controller/user_level_controller.php');
require_once('../validation.php');

//declare variables and clear them
$user_pw = '';
$f_name = '';
$l_name = '';
$e_mail = '';


//declare varibles and clear them for error messages
$user_pw_error = '';
$f_name_error = '';
$l_name_error = '';
$email_error = '';

//Retrieve values from querry string and store in a local variable
if(isset($_POST['pw']))
$user_pw = $_POST['pw'];
if(isset($_POST['fName']))
$f_name = $_POST['fName'];
if(isset($_POST['lName']))
$l_name = $_POST['lName'];
if(isset($_POST['email']))
$e_mail = $_POST['email'];

//validate the values that are entered
$user_pw_error = Validation\pwValid($user_pw, 4);
$f_name_error = Validation\firstNameValid($f_name, 2);
$l_name_error = Validation\lastNameValid($l_name, 2);
Validation\emailValid($e_mail, $email_error);

$levels = UserLevelController::getLevels();

$user = new User('', '', '', '', $levels[0]);
//$user = new User('', '', '', '', 2);
$user->setUserNo(-1);
$pageTitle = "User Registration";

//Retrieve the contactNo from the query string amd
//use it to create a contact object for that pNo
if (isset($_GET['uNo'])) {
    $user =
        NewUserController::getUserByNo($_GET['uNo']);
    $pageTitle = "Update an Existing User";
}

if (isset($_POST['save'])) {
    $user = new User($_POST['email'], $_POST['pw'], $_POST['fName'], $_POST['lName'], $levels[$_POST['levelOption']-1]);
    $user->setUserNo($_POST['uNo']);

    if ($user->getUserNo() === '-1') {
        //add
        if(strlen($user_pw_error || $f_name_error || $l_name_error || $email_error) > 0) {
            echo "There are validation Errors";
        } else { 
            header('Location: ../index.php');
            NewUserController::addUser($user);
        }
    } else {
        //update
        if(strlen($user_pw_error || $f_name_error || $l_name_error || $email_error) > 0) {
            echo "There are validation Errors";
        }else { 
            header('Location: ../index.php');
            NewUserController::updateUser($user);
    }
}
    
}
if (isset($_POST['cancel'])) {
    //cancel button - just go back to list
    header('Location: ../index.php');
}
    
?>

<html>

<head>
    <title>CIS480 Project</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>

<body>
    <div class="loginbox">
    <h2><?php echo $pageTitle; ?></h2>
    <br>
    <br>
    <form method = 'POST'>
        <p>E-Mail:<br> <input type = "text" name="email"
            value="<?php echo $user->getEMail(); ?>">
            <?php if(strlen($email_error) > 0)
                echo "<span style='color: white; text-shadow: blue 1px 1px;'>{$email_error}</span>"; ?>
        </p>
        <p>Password: <br><input type = "text" name="pw"
            value="<?php echo $user->getPassword(); ?>">
            <?php if(strlen($user_pw_error) > 0)
                echo "<span style='color: white; text-shadow: blue 1px 1px;'>{$user_pw_error}</span>"; ?>
        </p>
        <p>First Name: <br><input type = "text" name="fName"
            value="<?php echo $user->getFirstName(); ?>">
            <?php if(strlen($f_name_error) > 0)
                echo "<span style='color: white; text-shadow: blue 1px 1px;'>{$f_name_error}</span>"; ?>
        </p>
        <p>Last Name:<br> <input type = "text" name="lName"
            value="<?php echo $user->getLastName(); ?>">
            <?php if(strlen($l_name_error) > 0)
                echo "<span style='color: white; text-shadow: blue 1px 1px;'>{$l_name_error}</span>"; ?>
        </p>
        <p>User: <select name="levelOption">
            <?php foreach($levels as $userLevel) : ?>
                <option value = "<?php echo $userLevel->getUserLevelNo(); ?>"
                    <?php if ($userLevel->getUserLevelNo() ===
                        $user->getUserLevel()->getUserLevelNo()) {
                            echo 'selected'; }?>>
                <?php echo $userLevel->getLevelName(); ?></option>
            <?php endforeach ?>
                        </p>
        <input type="hidden"
            value="<?php echo $user->getUserNo(); ?>" name="uNo">
            <br>
            <br>
            <br>
        <input type="submit" value="Register" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>
</html>