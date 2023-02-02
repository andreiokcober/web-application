<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/index.css">
    <title>Мой профиль</title>
</head>

<body>
    <div class="main-container">
        <div class="profile-container">
            <h2>Hello</h2>
            <h2 id="profile-user-name">
                <?= $_SESSION['user']['full_name'] ?>
            </h2>
            <div class="profile-exit">
                <a href="../developer/profileExit.php" id="profile-exit" class="profile-exit">Выйти</a>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../index.js"></script>
</body>

</html>