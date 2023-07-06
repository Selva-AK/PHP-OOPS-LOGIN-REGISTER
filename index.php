<?php 

session_start();

require_once('config/dbconnect.php');
require_once('classes/Class.User.php');

$user = new User($conn);

//if already logged in, redirect to home page
if ($user->isLoggedIn()) 
{
    $user->redirect('home.php');
}

//When login button pressed, login
if (isset($_POST['login'])) 
{
    $uname = $_POST['user'];
    $pass = $_POST['password'];
    $login = $user->login($uname, $pass);
    
    if ($login === true)
    {
        $user->redirect('home.php');
    } 
    else 
    {
        echo $login;
    }
}

?>

<!DOCTYPE html>
<html>
<style>
    a{
        float:right;
    }
</style>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

<h2 style="font-size:3pc;">Login Form</h2>

<form method="post" action="index.php" name="loginform">

    <label><b>Email or Username</b></label>
    <input type="text" name="user" required />
    
    <label><b>Password</b></label>
    <input type="password" name="password" auto_complete="off" required />
    
    <input type="submit" name="login" value="Log in" />
  <a href="register.php"><b>Register new account</b></a>   
 </form>

 </body>
 </html>