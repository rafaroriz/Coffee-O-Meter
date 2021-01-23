<?php
include 'menu-header.php';
?>
<h1>Adicionar Tipo</h1>
<form action="" method="post" name="typeform">
    <table class="table">
        <tr>
            <td>Nome <span style="color: red">*</span></td>
            <td><input class="form-control" type="text" name="name" id="name" value="" /></td>
        </tr>
        <tr>
            <td><button class="btn btn-dark" type="button" onclick="validateForm('add-type.php')">Salvar</button></td>
            <td><p id="error-msg" class="text-danger text-left"></p></td>
        </tr>
    </table>
</form>
<?php
include 'footer.php';
?>
<script src="js/functions/type.js"></script>