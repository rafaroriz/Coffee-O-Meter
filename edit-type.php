<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];

$edited = editType($conn, $id, $name);
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