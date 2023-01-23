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
        <form action="">
            <h2 class="title">Авторизация</h2>
            <div class="input-conteiner">
                <input type="text" placeholder="Логин" name="login" id="input-login">
                <input type="password" placeholder="Пароль" name="password">
                <div>
                    <button class="btn btn-signIn" type="submit">Войти</button>
                </div>
                <div class="conteiner-register-auth">
                    <p>or</p> <a href="register.php" class="btn link-hover" id="link-register">Регистрация</a>
                </div>
            </div>

        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>