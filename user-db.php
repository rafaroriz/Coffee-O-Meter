<?php
function validateUser($conn, $email, $password)
{
    $step1 = false;
    $step2 = false;

    $consumption = array();
    $query = "select id, email, password from app_user where email = ?";
    $instruction = $conn->prepare($query);
    $instruction->bind_param('s', $email);
    $instruction->execute();
    $response = $instruction->get_result();
    
    $step1 = $response->fetch_assoc();
    if ($step1)
    {
        $step2 = password_verify($password, $step1['password']);
    }
    return $step1 && $step2;
}
