<?php
if (!isset($_SESSION["USER"]) || $_SESSION["USER"]["EMAIL"] == null)
{
    header("Location: login-form.php");
    die();
}