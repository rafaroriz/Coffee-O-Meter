<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';
?>
	<h1>Tipos Cadastrados</h1><br/>
	<table class="table table-striped">
		<?php
		$types = listType($conn);
		foreach ($types as $type)
		{
		?>
			<tr>
				<td><?=$type['name']?></td>
				<td class="icon_cell">
					<form name="edit-form" method="post" action="edit-type-form.php">
						<input name="id" type="hidden" value="<?=$type['id']?>" />
						<button class="btn btn-sm btn-outline-dark far fa-edit fa-1x"></button>
					</form>
				</td>
				<td class="icon_cell">
					<?php
					$is_used = isUsedByCoffee($conn, $type['id']);
					$btn_status = ($is_used) ? "disabled" : "";
					?>
					<form name="remove-form" method="post" action="confirm-remove-type.php">
						<input name="id" type="hidden" value="<?=$type['id']?>" />
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