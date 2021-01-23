<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';

$id = $_REQUEST['id'];
$type = getTypeById($conn, $id);
?>
<h1>Confirmar Remoção</h1>
<form action="remove-type.php" method="post">
    <input type="hidden" name="id" value="<?=$type['id']?>" />
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="name" value="<?=$type['name']?>" onfocus="this.blur()" readonly/></td>
        </tr>
        <tr>
            <td><button class="btn btn-danger" type="submit">Remover</button></td>
        </tr>
    </table>
</form>
<?php
include 'footer.php';
?>