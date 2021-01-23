<?php
function listCoffee($conn)
{
    $coffees = array();
    $query = "select c.id, c.name as coffee_name, c.description, t.name as type_name
            from coffee c inner join type t on (c.type_id = t.id) order by c.name";
    $instruction = $conn->prepare($query);
    $instruction->execute();
    $response = $instruction->get_result();
    while ($coffee = $response->fetch_assoc())
    {
        array_push($coffees, $coffee);
    }
    return $coffees;
}

function getCoffeeById($conn, $id)
{
    $query = "select id, name, description, type_id from coffee where id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('i', $id);
    $instruction->execute();
    $response = $instruction->get_result();
    return $response->fetch_assoc();
}

function addCoffee($conn, $name, $description, $type_id) {
    $query = "insert into coffee (name, description, type_id) values (?,?,?)";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('ssi', $name, $description, $type_id);
    return $instruction->execute();
}

function editCoffee($conn, $id, $name, $description, $type_id) {
    $query = "update coffee set name = ?, description = ?, type_id = ? where id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('ssii', $name, $description, $type_id, $id);
    return $instruction->execute();
}

function removeCoffee($conn, $id) {
    $query = "delete from coffee where id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('i', $id);
    return $instruction->execute();
}

function isInConsumption($conn, $id)
{
    $query = "select count(id) as qty from consumption where coffee_id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('i', $id);
    $instruction->execute();
    $response = $instruction->get_result();
    $count = $response->fetch_assoc();
    return $count['qty'];
}