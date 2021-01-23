<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';

$types = listType($conn);
?>
<h1>Adicionar Café</h1>
<form action="" method="post" name="coffeeform">
    <table class="table">
        <tr>
            <td>Nome <span style="color: red">*</span></td>
            <td><input class="form-control" type="text" name="name" id="name" value="" /></td>
        </tr>
        <tr>
            <td>Descrição <span style="color: red">*</span></td>
            <td><textarea class="form-control" type="text" name="description" id="description" ></textarea></td>
        </tr>
        <tr>
            <td>Tipo <span style="color: red">*</span></td>
            <td>
                <select class="form-control" name="type_id">
                    <?php
                    foreach($types as $type)
                    {
                    ?>
                        <option value="<?=$type['id']?>"> <?=$type['name']?> </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-dark" type="button" onclick="validateForm('add-coffee.php')">Salvar</button></td>
            <td><p id="error-msg" class="text-danger text-left"></p></td>
        </tr>
    </table>
</form>
<?php
include 'footer.php';
?>
<script src="js/functions/coffee.js"></script>