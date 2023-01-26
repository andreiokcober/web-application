<?php
// session_start();
$login = $_POST['login'];
$password = $_POST['password'];
$confirmPassword = $_Post['confirmPassword'];
$email = $_POST['email'];
$fullName = $_POST['fullName'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function getData()
    {
        $file = dirname(__FILE__) . '/t.json';
        if (file_exists($file)) {
            $current_data = file_get_contents($file);
            $array_data = json_decode($current_data, true);

            $newArr = array(
                'login' => $_POST['login'],
                'password' => $_POST['password'],
                'confirmPassword' => $_POST['confirmPassword'],
                'email' => $_POST['email'],
                'fullName' => $_POST['fullName'],
            );
            $array_data[] = $newArr;
            return json_encode($array_data);
        } else {
            echo 'noy';
        }
    }

    $file = dirname(__FILE__) . '/t.json';
    if (file_put_contents($file, getData())) {
        echo 'seccess';
    } else {
        echo 'no connect';
    }
}

// $response = [
//     'status' => true
// ];
// echo json_encode($response);
?>