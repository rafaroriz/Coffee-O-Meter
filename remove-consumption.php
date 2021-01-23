<?php
include 'menu-header.php';
include 'connect.php';
include 'consumption-db.php';

$id = $_REQUEST['id'];

$removed = removeConsumption($conn, $id);
if ($removed)
{
    include 'footer.php';
    header("Location: list-consumption.php");
    die();
}
else {
?>
    <p class="text-danger">Erro ao tentar remover o registro.</p>
<?php
}
include 'footer.php';
?>