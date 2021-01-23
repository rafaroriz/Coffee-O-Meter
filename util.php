<?php
function weekDay($date)
{
    $week_days = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado',);
    $week_day_number = date('w', strtotime($date));
    return $week_days[$week_day_number];
}

function isFieldValid($field, $array)
{
    return (array_key_exists($field, $array) && $array[$field] != '');
}