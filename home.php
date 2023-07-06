<?php

session_start();

require_once("config/dbconnect.php");
require_once('classes/Class.User.php');

$user = new User($conn);

if (!$user->isLoggedIn()) 
{
    $user->redirect('index.php');
}


?>

<!DOCTYPE html>
<html>
<style>
</style>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        h2{
            color:white;
            font-size:3pc;
            font-family:cursive;
        }
        h3{
            font-size:2pc;
        }
    </style>
</head>

<body>
    <h2>Hi, <?php echo $_SESSION['userName']; ?>. You have succesfully logged in!</h2>
    <h3><a href="logout.php?logout">Logout</a></h3>
</body>
</html>