<?php
session_start();
if (!isset($_SESSION["USER"]))
{
    $user = array();
    $user["EMAIL"] = null;

    $_SESSION["USER"] = $user;
}