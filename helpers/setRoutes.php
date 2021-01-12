<?php

Route::create('/', function(){
    $title = 'Главная';
    $namePage = 'Главная страница';
    $nameView = !isset($_SESSION['login']) ? 'login' : 'user';

    View::show($namePage, $nameView, $title);
});

Route::create('/login', function() {
    $title = 'Авторизация';
    $namePage = 'Авторизация';
    $nameView = 'login';

    View::show($namePage, $nameView, $title);
});

Route::create('/signup', function () {
    $title = 'Регистрация';
    $namePage = 'Регистрация';
    $nameView = 'signup';

    View::show($namePage, $nameView, $title);
});

Route::create('/user', function() {
    $title = 'Кабинет пользователя';
    $namePage = 'Личный кабинет';
    $nameView = 'user';

    View::show($namePage, $nameView, $title);
});
