<?php
session_start();
$login = $_POST['login'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$email = $_POST['email'];
$fullName = $_POST['fullName'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function getData()
    {
        $file = dirname(__FILE__) . '/t.json';
        if (file_exists($file)) {
            $current_data = file_get_contents($file);
            $array_data = json_decode($current_data, true);
            $password = $_POST['password'];
            $newArr = array(
                'login' => $_POST['login'],
                'password' => md5($password),
                'email' => $_POST['email'],
                'fullName' => $_POST['fullName'],
            );
            $array_data[] = $newArr;
            return json_encode($array_data);
        } else {
            echo 'noy';
        }
    }
    function validationRegister($login, $password, $confirmPassword, $email, $fullName)
    {
        $error_field = [];
        if ($login === '' || trim($login) !== $login || strlen($login) < '6') {
            $error_field[] = 'login';
        }
        if ($password === '' || trim($password) !== $password || strlen($password) < '6' || ctype_alpha($password) || ctype_xdigit($password)) {
            $error_field[] = 'password';
        }
        if ($password !== $confirmPassword) {
            $error_field[] = 'confirmPassword';
        }
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_field[] = 'email';
        }
        if ($fullName = '' || !ctype_alpha($fullName) || strlen($fullName) < '2') {
            $error_field[] = 'fullName';
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
            $file = dirname(__FILE__) . '\t.json';
            $current_data = file_get_contents($file);
            $jsonArr = json_decode($current_data, true);
            $userInBd = 'false';
            if ($jsonArr) {
                for ($i = 0; $i < count($jsonArr); ++$i) {
                    if ($jsonArr[$i]['login'] === $login || $jsonArr[$i]['email'] === $email) {
                        $userInBd = 'true';
                        break;
                    }
                }
            }
            if ($userInBd == 'true') {
                $error_field = ['login', 'email'];
                $response = [
                    "message" => 'Такой login или email уже используются',
                    "fields" => $error_field
                ];
                echo json_encode($response);
            } else {
                file_put_contents($file, getData());
                $response = [
                    'status' => true
                ];
                echo json_encode($response);
            }
        }
        die();
    }
    validationRegister($login, $password, $confirmPassword, $email, $fullName);
}
?>