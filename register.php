<?php

session_start();

require_once('config/dbconnect.php');
require_once('classes/Class.User.php');
require_once('classes/Class.Validate.php');

$user = new User($conn);

$validate = new Validate($conn);

//If user is already logged in, redirect to home page
if ($user->isLoggedIn()) 
{
    $user->redirect('home.php');
}

$errors = array();

//When register button is pressed, register
if (isset($_POST['register'])) 
{
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass2 = $_POST['passwordrepeat'];
    
    //Validate user input
    if ($validate->usernameValidate($uname) != null) 
    {
        $errors[] = $validate->usernameValidate($uname);
    }
    if ($validate->emailValidate($email) != null) 
    {
        $errors[] = $validate->emailValidate($email);
    }
    if ($validate->passwordValidate($pass, $pass2) != null) 
    {
        $errors[] = $validate->passwordValidate($pass, $pass2);
    }
    
    //If no validation errors register input, else display errors
    if (empty($errors)) 
    {
        if($user->register($uname, $email, $pass) === true) 
        {
            $user->redirect('register.php?joined');
        }
        else 
        {?>
        <div style="color:red";>
           <?php echo 'Error registering. please try again.';?></div><?php
        }
    }
    else
    {
        foreach ($errors as $error) 
        {
            printf ($error . "<br/>");
        }
    }   
}

?>

<!DOCTYPE html>
<html>
<style>
</style>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        h2{
            font-size:3pc;
        }
    </style>
</head>

<body>

<h2>Registration Form</h2>

<?php
if (isset($_GET['joined'])) 
{
?>
<h1>Succesfully registered. You can now <a href="index.php">login</a>.</h1>
<?php
}
else 
{
?>
<form method="post" action="register.php" name="registerform">

    <label><b>Username</b></label>
    <input type="text" name="username" placeholder="Enter your Name" required />
    
    <label><b>Email</b></label>
    <input type="email" name="email" placeholder="Enter your Email" required />
    
    <label><b>Password</b></label>
    <input type="password" name="password" Placeholder="Enter More than 8 Characters" auto_complete="off" required />
    
    <label><b>Repeat Password</b></label>
    <input type="password" name="passwordrepeat" auto_complete="off" required />
    
    <input type="submit" name="register" value="Register" />
    
 </form>
<?php
}
?> 
 </body>
 </html>