<?php
include 'menu-header.php';
include 'connect.php';
include 'coffee-db.php';
include 'type-db.php';

$id = $_REQUEST['id'];
$coffee = getCoffeeById($conn, $id);
$types = listType($conn);
?>
<h1>Alterar Café</h1>
<form action="" method="post" name="coffeeform">
    <input type="hidden" name="id" value="<?=$coffee['id']?>" />
    <table class="table">
        <tr>
            <td>Nome <span style="color: red">*</span></td>
            <td><input class="form-control" type="text" name="name" id="name" value="<?=$coffee['name']?>" /></td>
        </tr>
        <tr>
            <td>Descrição <span style="color: red">*</span></td>
            <td><textarea class="form-control" type="text" name="description" id="description" ><?=$coffee['description']?></textarea></td>
        </tr>
        <tr>
            <td>Tipo <span style="color: red">*</span></td>
            <td>
                <select class="form-control" name="type_id">
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
            <td><button class="btn btn-dark" type="button" onclick="validateForm('edit-coffee.php')">Salvar</button></td>
            <td><p id="error-msg" class="text-danger text-left"></p></td>
        </tr>
    </table>
</form>
<?php
include 'footer.php';
?>
<script src="js/functions/coffee.js"></script>