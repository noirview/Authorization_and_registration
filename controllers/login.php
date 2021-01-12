<?php

session_start();

require_once '../classes/db.php';

$login_form = $_POST['login'];
$password_form = $_POST['password'];

$response = [];
$error = [];

$login_entities = DB::get('//User[@login="'.$login_form.'"]');
if ($login_entities->length == 0) {
    $error['login'] = 'Неправильный логин или пароль';
    $error['password'] = 'Неправильный логин или пароль';

    $response['success'] = 'no';
    $response['error'] = $error;

    echo json_encode($response);
    return;
}

$password_db = $login_entities[0]->getAttribute('password');
if ($password_form != $password_db) {
    $error['login'] = 'Неправильный логин или пароль';
    $error['password'] = 'Неправильный логин или пароль';

    $response['success'] = 'no';
    $response['error'] = $error;

    echo json_encode($response);
    return;
} else {
    $response['success'] = 'ok';

    echo json_encode($response);

    $_SESSION['login'] = $login_form;
}