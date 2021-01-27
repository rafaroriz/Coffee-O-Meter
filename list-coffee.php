<?php
include 'menu-header.php';
include 'connect.php';
include 'coffee-db.php';
?>
	<h1>Cafés Cadastrados</h1><br/>
	<table class="table table-striped">
		<?php
		$coffees = listCoffee($conn);
		foreach ($coffees as $coffee)
		{
		?>
			<tr>
				<td><?=$coffee['coffee_name']?></td>
				<td><?=$coffee['description']?></td>
				<td><?=$coffee['type_name']?></td>
				<td class="icon_cell">
					<form name="edit-form" method="post" action="edit-coffee-form.php">
						<input name="id" type="hidden" value="<?=$coffee['id']?>" />
						<button class="btn btn-sm btn-outline-dark far fa-edit"></button>
					</form>
				</td>
				<td class="icon_cell">
					<?php
						$is_used = isInConsumption($conn, $coffee['id']);
						$btn_status = ($is_used) ? "disabled" : "";
					?>
					<form name="remove-form" method="post" action="confirm-remove-coffee.php">
						<input name="id" type="hidden" value="<?=$coffee['id']?>" />
						<button class="btn btn-sm btn-outline-danger far fa-trash-alt" <?=$btn_status?> ></button>
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