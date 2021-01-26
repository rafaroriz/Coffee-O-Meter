<?php
include 'connect.php';
include 'user-db.php';

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$redirect = "Location: login-error.php";

$user = validateUser($conn, $email, $password);
if ($user)
{
    $redirect = "Location: list-consumption.php";
}

header($redirect);
die();