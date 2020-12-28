<?php
require_once 'config_auth.php';

if (!empty($_GET['code'])) {
    // Отправляем код для получения токена (POST-запрос).
    $params = array(
        'client_id'     => '199655479501-l8pt47262bb55cv7uni5pb48351ds2of.apps.googleusercontent.com',
        'client_secret' => 'NrSMVox_v0VR8boMckpUpD1l',
        'redirect_uri'  => 'http://localhost/web-servises/web-servises/googleAuthPage.php',
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code']
    );

    $ch = curl_init('https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);
    echo "Отправили токен\n";
    echo $data;
    $data = json_decode($data, true);
    if (!empty($data['access_token'])) {
        echo "Зашли в условие\n";
        // Токен получили, получаем данные пользователя.
        $params = array(
            'access_token' => $data['access_token'],
            'id_token'     => $data['id_token'],
            'token_type'   => 'Bearer',
            'expires_in'   => 3599
        );

        $info = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?' . urldecode(http_build_query($params)));
        $info = json_decode($info, true);

        // Проверяем, существует ли уже логин, email, ФИО или номер
        $user_check_query = "SELECT * FROM users WHERE username='$info[email]' OR email='$info[email]' OR fullName='$info[name]' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // если существует, то выводим соответствующие ошибки
            $_POST['login_user'] = true;
            $_POST['username'] = $info['email'];
            $_POST['password'] = $info['id'];
        }
        else{

            $_POST['reg_user'] = true;
            $_POST['email'] = $info['email'];
            $_POST['username'] = $info['email'];
            $_POST['password_1'] = $info['id'];
            $_POST['password_2'] = $_POST['password_1'];
            $_POST['fullName'] = $info['name'];
            $_POST['number'] = '89013457611';
        }
         require_once 'server.php';
    }
}