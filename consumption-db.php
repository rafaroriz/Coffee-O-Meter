<?php
function listConsumption($conn)
{
    $consumption = array();
    $query = "select con.id, date_format(con.date, '%d/%m/%Y') as date,
            date_format(con.hour, '%H:%i') as hour, con.week_day, con.price,
            con.quantity as qty, cof.name as coffee_name from consumption con
            inner join coffee cof on (con.coffee_id = cof.id)
            order by con.date desc, con.hour desc";
    $instruction = $conn->prepare($query);
    $instruction->execute();
    $response = $instruction->get_result();
    while ($entry = $response->fetch_assoc())
    {
        array_push($consumption, $entry);
    }
    return $consumption;
}

function listConsumptionByWeekDay($conn)
{
    $consumption = array();
    $query = "select week_day, count(id) as qty from consumption group by week_day";
    $instruction = $conn->prepare($query);
    $instruction->execute();
    $response = $instruction->get_result();
    while ($entry = $response->fetch_assoc())
    {
        $consumption[$entry['week_day']] = $entry['qty'];
    }
    return $consumption;
}

function addConsumption($conn, $date, $hour, $coffee_id, $qty, $price, $week_day)
{
    $query = "insert into consumption (date, hour, coffee_id, quantity, price, week_day) values (?,?,?,?,?,?)";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('ssiids', $date, $hour, $coffee_id, $qty, $price, $week_day);
    return $instruction->execute();
}

function removeConsumption($conn, $id)
{
    $query = "delete from consumption where id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('i', $id);
    return $instruction->execute();
}