<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/index.css">
    <title>Авторизация и регистрация</title>
</head>

<body>
    <div class="main-container">
        <form action="" method="post">
            <h2 class="title">Регистрация</h2>
            <div class="input-conteiner">
                <input type="text" placeholder="Логин" id="input-login" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <input type="password" placeholder="Повторите пароль" name="confirmPassword">
                <input type="email" placeholder="Электронная почта" name="email">
                <input type="text" placeholder="Имя" name="Full-name">
                <div>
                    <button class="btn btn-signIn" type="submit">Зарегистрироваться</button>
                </div>
                <div class="conteiner-register-auth">
                    <a href="index.php" class="btn link-hover" id="link-auth">Авторизация</a>
                </div>
            </div>

        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>