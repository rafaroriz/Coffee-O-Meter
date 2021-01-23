<?php
include 'menu-header.php';
include 'connect.php';
include 'consumption-db.php';
?>
	<div class="row">
		<div class="col">
			<h1 class="text-left">O que eu já consumi...</h1>
		</div>
		<div class="col-1 align-self-end">
			<button class="btn btn-outline-dark text-right" onclick="window.open('list-consumption-sheet.php', '_blank')">Exportar XLS</button>
		</div>
		<div class="col-2 align-self-end">
			<button class="btn btn-outline-dark text-right" onclick="window.open('list-consumption-report.php', '_blank')">Relatório</button>
		</div>
	</div><br/>
	<table class="table table-striped table-bordered">
		<tr>
			<th>Data</th>
			<th>Hora</th>
			<th>Dia</th>
			<th>Café</th>
			<th>Qtd</th>
			<th>Preço</th>
			<th></th>
		</tr>
		<?php
		$consumption = listConsumption($conn);
		foreach ($consumption as $entry)
		{
			$mili_qty = $entry["qty"];
			$liter_qty = $mili_qty / 1000;
			$formated_qty = ($liter_qty < 1) ? "{$mili_qty}ml" : "{$liter_qty}l";
		?>
			<tr>
				<td><?=$entry['date']?></td>
				<td><?=$entry['hour']?></td>
				<td><?=$entry['week_day']?></td>
				<td><?=$entry['coffee_name']?></td>
				<td><?=$formated_qty?></td>
				<td>R$ <?=number_format($entry['price'],2,',','.')?></td>
				<td>
					<form name="remove-form" method="post" action="remove-consumption.php">
						<input name="id" type="hidden" value="<?=$entry['id']?>" />
						<button class="btn btn-danger btn-block">Remover</button>
					</form>
				</td>
			</tr>
		<?php
		}
		?>
	</table>
	<button class="btn btn-dark btn-lg btn-block" onclick="window.location.href='add-consumption-form.php'">Café++</button>
<?php
include 'footer.php';
?>