<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];

function searchUser($login, $password)
{
    $file = dirname(__FILE__) . '/t.json';
    $current_data = file_get_contents($file);
    $jsonArr = json_decode($current_data, true);
    $userBD = 'false';
    for ($i = 0; $i < count($jsonArr); ++$i) {
        if ($jsonArr[$i]['login'] == $_POST['login'] and $jsonArr[$i]['password'] == $_POST['password']) {
            $userBD = 'true';
            $_SESSION['user'] = [
                "login" => $jsonArr[$i]['login'],
                "full_name" => $jsonArr[$i]['fullName'],
                "email" => $jsonArr[$i]['email'],

            ];

        } else {

        }
    }
    if ($userBD == 'true') {
        $response = [
            "status" => true
        ];
        echo json_encode($response);
    } else {
        $response = [
            "status" => false,
            "message" => 'не верный логин или пароль'
        ];
        echo json_encode($response);
    }

}
function validationAuth($login, $password)
{
    $error_field = [];
    if ($login === '') {
        $error_field[] = 'login';
    }
    if ($password === '') {
        $error_field[] = 'password';
    }
    if (!empty(($error_field))) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => 'Проверьте правильность полей',
            "fields" => $error_field
        ];
        echo json_encode($response);
    } else {
        searchUser($login, $password);
    }
    die();
}
validationAuth($login, $password)
    ?>