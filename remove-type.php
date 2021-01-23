<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];

$removed = removeType($conn, $id);
if ($removed)
{
?>
    <p class="text-success">O registro <?=$name?> foi removido com sucesso.</p>
<?php
}
else {
?>
    <p class="text-danger">Erro ao tentar remover o registro <?=$name?>.</p>
<?php
}
include 'footer.php';
?>