<?php
include 'menu-header.php';
include 'connect.php';
include 'coffee-db.php';
?>
	<h1>Cafés Cadastrados</h1><br/>
	<table class="table table-striped table-bordered">
		<?php
		$coffees = listCoffee($conn);
		foreach ($coffees as $coffee)
		{
		?>
			<tr>
				<td><?=$coffee['coffee_name']?></td>
				<td><?=$coffee['description']?></td>
				<td><?=$coffee['type_name']?></td>
				<td>
					<form name="edit-form" method="post" action="edit-coffee-form.php">
						<input name="id" type="hidden" value="<?=$coffee['id']?>" />
						<button class="btn btn-dark btn-block">Alterar</button>
					</form>
				</td>
				<td>
					<?php
						$is_used = isInConsumption($conn, $coffee['id']);
						$btn_status = ($is_used) ? "disabled" : "";
					?>
					<form name="remove-form" method="post" action="confirm-remove-coffee.php">
						<input name="id" type="hidden" value="<?=$coffee['id']?>" />
						<button class="btn btn-danger btn-block" <?=$btn_status?> >Remover</button>
					</form>
				</td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
include 'footer.php';
?>