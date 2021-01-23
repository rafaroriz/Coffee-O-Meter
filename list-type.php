<?php
include 'menu-header.php';
include 'connect.php';
include 'type-db.php';
?>
	<h1>Tipos Cadastrados</h1><br/>
	<table class="table table-striped table-bordered">
		<?php
		$types = listType($conn);
		foreach ($types as $type)
		{
		?>
			<tr>
				<td><?=$type['name']?></td>
				<td>
					<form name="edit-form" method="post" action="edit-type-form.php">
						<input name="id" type="hidden" value="<?=$type['id']?>" />
						<button class="btn btn-dark btn-block">Alterar</button>
					</form>
				</td>
				<td>
					<?php
					$is_used = isUsedByCoffee($conn, $type['id']);
					$btn_status = ($is_used) ? "disabled" : "";
					?>
					<form name="remove-form" method="post" action="confirm-remove-type.php">
						<input name="id" type="hidden" value="<?=$type['id']?>" />
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