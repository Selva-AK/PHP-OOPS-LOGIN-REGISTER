<?php

$DBHOST = "localhost";  //your hostname
$DBUSER = "root";       //your username
$DBPASS = "";           //your password
$DBNAME = "Register";   //your database name

//Create Connection
$conn =mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}

?>