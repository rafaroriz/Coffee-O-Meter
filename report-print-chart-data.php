<?php
$week_day_consumption = listConsumptionByWeekDay($conn);

$monday = $week_day_consumption[4]['qty'];
$tuesday = $week_day_consumption[6]['qty'];
$wednesday = $week_day_consumption[1]['qty'];
$thursday = $week_day_consumption[2]['qty'];
$friday = $week_day_consumption[5]['qty'];
$saturday = $week_day_consumption[3]['qty'];
$sunday = $week_day_consumption[0]['qty'];

echo "['Segunda - {$monday}', {$monday}],";
echo "['Terça - {$tuesday}', {$tuesday}],";
echo "['Quarta - {$wednesday}', {$wednesday}],";
echo "['Quinta - {$thursday}', {$thursday}],";
echo "['Sexta - {$friday}', {$friday}],";
echo "['Sábado - {$saturday}', {$saturday}],";
echo "['Domingo - {$sunday}', {$sunday}],";