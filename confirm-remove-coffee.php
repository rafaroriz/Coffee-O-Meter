<?php
include 'menu-header.php';
include 'connect.php';
include 'coffee-db.php';
include 'type-db.php';

$id = $_REQUEST['id'];
$coffee = getCoffeeById($conn, $id);
$types = listType($conn);
?>
<h1>Confirmar Remoção</h1>
<form action="remove-coffee.php" method="post">
    <input type="hidden" name="id" value="<?=$coffee['id']?>" />
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="name" value="<?=$coffee['name']?>" onfocus="this.blur()" readonly/></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><textarea class="form-control" type="text" name="description" onfocus="this.blur()" readonly><?=$coffee['description']?></textarea></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td>
                <select class="form-control" name="type_id" disabled>
                    <?php
                    foreach($types as $type)
                    {
                        $selectedOption = ($coffee['type_id'] == $type['id']) ? "selected='selected'" : "";
                    ?>
                        <option value="<?=$type['id']?>" <?=$selectedOption?> > <?=$type['name']?> </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-danger" type="submit">Remover</button></td>
        </tr>
    </table>
</form>
<?php
include 'footer.php';
?>