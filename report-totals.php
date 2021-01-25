<h4>Totais</h4>
<br/>
<table class="table">
    <tr>
        <th>Cafés</th>
        <th>Quantidade</th>
        <th>Preço</th>
    </tr>
    <tr>
        <td><?=$total_cups?></td>
        <td><?=$formated_total?></td>
        <td>R$ <?=number_format($total_price,2,',','.')?></td>
    </tr>
</table>

<div id="piechart" style="width: 900px; height: 500px;"></div>