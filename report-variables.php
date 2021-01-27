<?php
$week_day_consumption = listConsumptionByWeekDay($conn);

$monday = (array_key_exists('Segunda', $week_day_consumption)) ? $week_day_consumption['Segunda'] : 0;
$tuesday = (array_key_exists('Terça', $week_day_consumption)) ? $week_day_consumption['Terça'] : 0;
$wednesday = (array_key_exists('Quarta', $week_day_consumption)) ? $week_day_consumption['Quarta'] : 0;
$thursday = (array_key_exists('Quinta', $week_day_consumption)) ? $week_day_consumption['Quinta'] : 0;
$friday = (array_key_exists('Sexta', $week_day_consumption)) ? $week_day_consumption['Sexta'] : 0;
$saturday = (array_key_exists('Sábado', $week_day_consumption)) ? $week_day_consumption['Sábado'] : 0;
$sunday = (array_key_exists('Domingo', $week_day_consumption)) ? $week_day_consumption['Domingo'] : 0;

$total_price = 0;
$total_qty = 0;
$total_cups = 0;
$today = date('d/m/Y H:i:s');