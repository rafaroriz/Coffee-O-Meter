<?php
include 'menu-header.php';
include 'connect.php';
include 'coffee-db.php';

$name = $_REQUEST['name'];
$description = $_REQUEST['description'];
$type_id = $_REQUEST['type_id'];

$added = addCoffee($conn, $name, $description, $type_id);
if ($added)
{
?>
    <p class="text-success">O registro <?=$name?> foi adicionado com sucesso.</p>
<?php
}
else {
?>
    <p class="text-danger">Erro ao tentar adicionar o registro <?=$name?>.</p>
<?php
}
include 'footer.php';
?>