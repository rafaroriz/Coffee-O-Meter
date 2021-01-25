<?php
$week_day_consumption = listConsumptionByWeekDay($conn);
foreach ($week_day_consumption as $consumption)
{
    $day = $consumption['week_day'];
    $qty = $consumption['qty'];
    echo "['{$day} ({$qty})', {$qty}],";
}