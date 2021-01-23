<?php
include 'menu-header.php';
include 'connect.php';
include 'coffee-db.php';

$coffees = listCoffee($conn);
?>
<h1>Novo Consumo</h1>
<form action="add-consumption.php" method="post">
    <table class="table">
        <tr>
            <td>Data</td>
            <td><input class="form-control" type="date" name="date" /></td>
        </tr>
        <tr>
            <td>Hora</td>
            <td><input class="form-control" type="time" name="hour" ></td>
        </tr>
        <tr>
            <td>Café</td>
            <td>
                <select class="form-control" name="coffee_id">
                    <?php
                    foreach($coffees as $coffee)
                    {
                    ?>
                        <option value="<?=$coffee['id']?>"> <?=$coffee['coffee_name']?> </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Qtd (ml)</td>
            <td><input class="form-control" type="number" name="qty" min="0" step="10"></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input class="form-control" type="number" name="price" min="0.00" max="999.99" step="0.1"></td>
        </tr>
        <tr>
            <td><button class="btn btn-dark" type="submit">Adicionar</button></td>
        </tr>
    </table>
</form>
<?php
include 'footer.php';
?>