<h4>Totais</h4>
<br/>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Cafés</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tr class="font-weight-bold text-danger">
        <td><?=$total_cups?></td>
        <td><?=$formated_total?></td>
        <td>R$ <?=number_format($total_price,2,',','.')?></td>
    </tr>
</table>

<div class="page_break" id="piechart" style="height: 500px;"></div>