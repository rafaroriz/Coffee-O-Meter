<?php
date_default_timezone_set('Brazil/East');

include 'menu-header.php';
include 'connect.php';
include 'consumption-db.php';
include 'util.php';

$date = isFieldValid('date', $_REQUEST) ? $_REQUEST['date'] : date('Y-m-d');
$hour = isFieldValid('hour', $_REQUEST) ? $_REQUEST['hour'] : date('H:i');
$qty = isFieldValid('qty', $_REQUEST) ? $_REQUEST['qty'] : 0;
$price = isFieldValid('price', $_REQUEST) ? $_REQUEST['price'] : 0;
$coffee_id = $_REQUEST['coffee_id'];
$week_day = weekDay($date);

$added = addConsumption($conn, $date, $hour, $coffee_id, $qty, $price, $week_day);
if ($added)
{
    include 'footer.php';
    header("Location: list-consumption.php");
    die();
}
else {
?>
    <p class="text-danger">Erro ao tentar adicionar o registro.</p>
<?php
}
include 'footer.php';
?>