<?php
function listType($conn)
{
    $types = array();
    $query = "select id, name from type order by name";
    $instruction = $conn->prepare($query);
    $instruction->execute();
    $response = $instruction->get_result();
    while ($type = $response->fetch_assoc()) 
    {
        array_push($types, $type);
    }
    return $types;
}

function getTypeById($conn, $id)
{
    $query = "select id, name from type where id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('i', $id);
    $instruction->execute();
    $response = $instruction->get_result();
    return $response->fetch_assoc();
}

function addType($conn, $name) {
    $query = "insert into type (name) values (?)";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('s', $name);
    return $instruction->execute();
}

function editType($conn, $id, $name)
{
    $query = "update type set name = ? where id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('si', $name, $id);
    return $instruction->execute();
}

function removeType($conn, $id) {
    $query = "delete from type where id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('i', $id);
    return $instruction->execute();
}

function isUsedByCoffee($conn, $id)
{
    $query = "select count(id) as qty from coffee where type_id = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('i', $id);
    $instruction->execute();
    $response = $instruction->get_result();
    $count = $response->fetch_assoc();
    return $count['qty'];
}

function isNameUsed($conn, $name)
{
    $query = "select count(id) as qty from type where name = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('s', $name);
    $instruction->execute();
    $response = $instruction->get_result();
    $count = $response->fetch_assoc();
    return $count['qty'];
}