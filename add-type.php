<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';

$name = $_REQUEST['name'];
$is_used = isNameUsed($conn, $name);
if(!$is_used) {
    $added = addType($conn, $name);
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
}
else {
?>
    <p class="text-danger">"<?=$name?>" já existe no cadastro de tipos.</p>
<?php
}
include 'footer.php';
?>