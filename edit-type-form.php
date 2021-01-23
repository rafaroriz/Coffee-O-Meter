<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';

$id = $_REQUEST['id'];
$type = getTypeById($conn, $id);
$is_used = isUsedByCoffee($conn, $id);
$msg = ($is_used) ? "Atenção! Existem cafés associados a este tipo.<br/>Caso confirme a operação, todos os cafés associados receberão o novo tipo." : "";
?>
<h1>Alterar Tipo</h1>
<form action="" method="post" name="typeform">
    <input type="hidden" name="id" value="<?=$type['id']?>" />
    <table class="table">
        <tr>
            <td>Nome <span style="color: red">*</span></td>
            <td><input class="form-control" type="text" name="name" id="name" value="<?=$type['name']?>" /></td>
        </tr>
        <tr>
            <td><button class="btn btn-dark" type="button" onclick="validateForm('edit-type.php')">Salvar</button></td>
            <td><p id="error-msg" class="text-danger text-left"></p></td>
        </tr>
    </table>
</form>
<div id="type-used-msg"><p class="text-danger"><?=$msg?></p></div>
<?php
include 'footer.php';
?>
<script src="js/functions/type.js"></script>