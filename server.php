<?php
// Объявление переменных
$username = ""; //переменная для хранения логина
$email    = ""; // Переменная для хранения email
$errors = array(); //массив для ошибок
$fullName = ""; //Переменная для хранения личных данных: ФИО
$number = ""; // Перменная для хранения номера (номера телефона)
$user_id = "";

// Подключаемся к БД
$db = mysqli_connect('localhost', 'root', '', 'registration');

// Для регистрации
if (isset($_POST['reg_user'])) {
    // Получаем введенные пользователем данные из формы
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $fullName = mysqli_real_escape_string($db, $_POST['fullName']);
    $number = mysqli_real_escape_string($db, $_POST['number']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // Валидация формы: проверяем на корректность введенные данные через (array_push()), если ошибки при вводе данных - записываем их в массив ошибок и выводим на экран
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($fullName)) { array_push($errors, "Full name is required"); }
    if (empty($number)) { array_push($errors, "Number is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if(strlen($password_1) < 8){ array_push($errors, "Password must not be less than 8 characters"); }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // Проверяем, существует ли уже логин, email, ФИО или номер
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR fullName='$fullName' OR number='$number' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // если существует, то выводим соответствующие ошибки
        if ($user['username'] === $username) {
            array_push($errors, "This username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "This email already exists");
        }

        if ($user['fullName'] === $fullName) {
            array_push($errors, "Full name already exists");
        }
        if ($user['number'] === $number) {
            array_push($errors, "This number already exists");
        }
    }

    // ЕСли ошибок нет - регистрируем
    if (count($errors) == 0) {
        $password = md5(trim($password_1));//хэширование пароля для обеспечения безопасности

        $query = "INSERT INTO users (username, email, fullName, number, password) 
  			  VALUES('$username', '$email', '$fullName', '$number', '$password')";
        mysqli_query($db, $query);
        $user_id = $user['id'];
        $_SESSION['id'] = $user_id;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

// Для зарегистрированных пользователей:
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5(trim($password));
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            session_start();
            $user_id = $user['id'];
            $_SESSION['id'] = $user_id;
           // $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
//Скрипт для смены личных данных в учетной записи
if (isset($_POST['edit'])) {
    $new_username = mysqli_real_escape_string($db, $_POST['new_username']);
    $new_email = mysqli_real_escape_string($db, $_POST['new_email']);
    $new_fullName = mysqli_real_escape_string($db, $_POST['new_fullName']);
    $new_number = mysqli_real_escape_string($db, $_POST['new_number']);
    $new_password = mysqli_real_escape_string($db, $_POST['new_password']);

// Какая-никакая, но валидация формы изменения учетных данных
    if(strlen($new_password) < 8)
    {
        array_push($errors, "Password must not be less than 8 characters");
    }

        // Проверяем, не ввел ли пользователь те же самые данные
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR fullName='$fullName' OR number='$number' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // если существует, то выводим соответствующие ошибки
            if (empty($user['username'])) {
                array_push($errors, "Username is required");
            }
            if (empty($user['username'])) {
                array_push($errors, "Password is required");
            }
            if (empty($user['fullName'])) {
                array_push($errors, "Personal data is required");
            }
            if (empty($user['number'])) {
                array_push($errors, "Number is required");
            }
        }
        // Если без ошибок - перезаписываем новые данные в БД
    if (count($errors) == 0) {
        $New_password = md5(trim($new_password));//хэшируем новый пароль
        $query = "UPDATE users SET username='$new_username', email='$new_email', fullName='$new_fullName', number='$new_number', password='$New_password'";
        mysqli_query($db, $query);
        start_session();
        $user_id = $user['id'];
        $_SESSION['id'] = $user_id;
       // $_SESSION['username'] = $new_username;
        header('location: index.php');
    }
}
?>
