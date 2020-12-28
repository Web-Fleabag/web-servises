<?php
$params = array(
    'client_id'     => '199655479501-l8pt47262bb55cv7uni5pb48351ds2of.apps.googleusercontent.com',
    'redirect_uri'  => 'http://localhost/web-servises/web-servises/googleAuthPage.php',
    'response_type' => 'code',
    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
    'state'         => '123'
);

$url = 'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query($params));
echo '<a href="' . $url . '">Авторизация через Google</a>';
?>