<?php
include 'menu-header.php';
include 'connect.php';
include 'coffee-db.php';

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$description = $_REQUEST['description'];
$type_id = $_REQUEST['type_id'];

$edited = editCoffee($conn, $id, $name, $description, $type_id);
if ($edited)
{
?>
    <p class="text-success">O registro <?=$name?> foi alterado com sucesso.</p>
<?php
}
else {
?>
    <p class="text-danger">Erro ao tentar alterar o registro <?=$name?>.</p>
<?php
}
include 'footer.php';
?>