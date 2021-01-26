<?php
session_start();
if (isset($_SESSION["USER"]))
{
    session_destroy();
    header("Location: login-form.php");
    die();
}