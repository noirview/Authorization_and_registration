<form class="content" name="signupForm"  method="post">

<h1> <?php echo $namePage; ?> </h1>

    <label for="login">
        Логин:
        <div class="input">
            <input id="login" name="login" type="text">
        </div>
    </label>

    <label for="email">
        E-mail:
        <div class="input">
            <input id="email" name="mail" type="email">
        </div>
    </label>

    <label for="password">
        Пароль:
        <div class="input">
            <input id="password" name="password" type="password">
        </div>
    </label>

    <label for="confirm_password">
        Подтвердите пароль:
        <div class="input">
            <input id="confirm_password" name="confirm_password" type="password">
        </div>
    </label>

    <button id="signupForm" type="submit">Отправить</button>

    <a href="/login">Авторизация</a>
</form>