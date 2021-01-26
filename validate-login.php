<?php
include 'user.php';
include 'connect.php';
include 'user-db.php';

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$redirect = "Location: login-error.php";

$user = validateUser($conn, $email, $password);
if ($user)
{
    $_SESSION["USER"]["EMAIL"] = $email;
    $redirect = "Location: list-consumption.php";
}

header($redirect);
die();