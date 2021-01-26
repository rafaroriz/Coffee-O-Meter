<div id="report-content">
    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Dia</th>
                <th>Café</th>
                <th>Qtd</th>
                <th>Preço</th>
            </tr>
        </thead>
        <?php
        $consumption = listConsumption($conn);
        foreach ($consumption as $entry)
        {
            $total_price += $entry['price'];
            $total_qty += $entry['qty'];
            $total_cups++;

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
            </tr>
        <?php
        }

        $liter_total = $total_qty / 1000;
        $formated_total = ($liter_total < 1) ? "{$total_qty}ml" : "{$liter_total}l";
        ?>
    </table>
<br/>