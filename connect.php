<?php
//$conn = mysqli_connect('localhost:3306', 'root', '', 'coffeeometerdb');
//mysqli_set_charset($conn, 'utf8');

$conn = new mysqli('localhost:3306', 'root', '', 'coffeeometerdb');
$conn->set_charset('utf8');