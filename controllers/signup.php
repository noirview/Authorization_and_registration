<?php

require_once '../classes/db.php';

$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['mail'];

$response = [];
$error = [];

if (DB::get('//User[@login="'.$login.'"]')->length != 0) {
    $error['login'] = 'Логин занят';
}

if (DB::get('//User[@email="'.$email.'"]')->length != 0) {
    $error['email'] = 'Email уже использован';
}

if (count(array_keys($error)) != 0) {
    $response['success'] = 'no';
    $response['error'] = $error;

    echo json_encode($response);
    return;
} else {
    DB::write($login, $password, $email);
    $response['success'] = 'ok';
    
    echo json_encode($response);
    return;
}