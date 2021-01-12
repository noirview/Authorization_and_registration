<form class="content" name="loginForm" method="post">
    <h1> <?php echo $namePage; ?> </h1>

    <label for="login">
        Ваш логин:
        <div class="input">
            <input name="login" placeholder="Username" type="text">
        </div>
    </label>
    <label for="password">
        Ваш пароль:
        <div class="input">
            <input name="password" placeholder="Password" type="password">
        </div>
    </label>

    <button name="loginForm" type="submit">Отправить</button>
    <a href="/signup">Регистрация</a>
</form>
