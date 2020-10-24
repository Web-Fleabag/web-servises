<?php
//session_start();
// Объявление переменных
$username = ""; //переменная для хранения логина
$email    = ""; // Переменная для хранения email
$errors = array(); //массив для ошибок
$fullName = ""; //Переменная для хранения личных данных: ФИО
$number = ""; // Перменная для хранения номера (номера телефона)
function generateSalt()
{
    $salt = '';
    $saltLength = 8; //длина соли
    for($i=0; $i<$saltLength; $i++) {
        $salt .= chr(mt_rand(33,126)); //символ из ASCII-table
    }
    return $salt;
}
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
        $password = md5($password_1);//хэширование пароля для обеспечения безопасности

        $query = "INSERT INTO users (username, email, fullName, number, password) 
  			  VALUES('$username', '$email', '$fullName', '$number', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
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
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
           session_start();
            $_SESSION['username'] = $username;
            //Проверяем, что была нажата галочка 'Запомнить меня':
            if ( !empty($_REQUEST['remember']) and $_REQUEST['remember'] == 1 ) {
                //Сформируем случайную строку для куки (используем функцию generateSalt):
                $key = generateSalt(); //назовем ее $key

                //Пишем куки (имя куки, значение, время жизни - сейчас+месяц)
                setcookie('username', $user['username'], time()+60*60*24*30); //логин
                setcookie('key', $key, time()+60*60*24*30); //случайная строка

                /*
                    Пишем эту же куку в базу данных для данного юзера.

                    Формируем и отсылаем SQL запрос:
                    ОБНОВИТЬ  таблицу_users УСТАНОВИТЬ cookie = $key ГДЕ login=$login.
                */
                $query = 'UPDATE users SET cookie="'.$key.'" WHERE username="'.$username.'"';
                mysqli_query($db, $query);
            }
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

//


/*
    Если пользователь не авторизован (проверяем по сессии) -
    тогда проверим его куки, если в куках есть логин и ключ,
    то пробьем их по базе данных.
    Если пара логин-ключ подходит - пишем авторизуем пользователя.

    Если пользователь авторизован - ничего не делаем.
    Поэтому этот код должен вызываться всегда при заходе пользователя на сайт -
    нагрузку на сервер он не создает.

    Если пустая переменная auth из сессии ИЛИ она равна false (для авторизованного она true).
*/
if (empty($_SESSION['username']) or $_SESSION['username'] == false) {
    //Проверяем, не пустые ли нужные нам куки...
    if (!empty($_COOKIE['username']) and !empty($_COOKIE['key'])) {
        //Пишем логин и ключ из КУК в переменные (для удобства работы):
        $username = $_COOKIE['username'];
        $key = $_COOKIE['key']; //ключ из кук (аналог пароля, в базе поле cookie)

        /*
            Формируем и отсылаем SQL запрос:
            ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login.
        */
        $query = 'SELECT*FROM users WHERE username="' . $username . '" AND cookie="' . $key . '"';

        //Ответ базы запишем в переменную $result:
        $result = mysqli_fetch_assoc(mysqli_query($db, $query));

        //Если база данных вернула не пустой ответ - значит пара логин-ключ_к_кукам подошла...
        if (!empty($result)) {
            //Стартуем сессию:
            session_start();

            //Пишем в сессию информацию о том, что мы авторизовались:
            $_SESSION['username'] = true;

            /*
                Пишем в сессию логин и id пользователя
                (их мы берем из переменной $user!):
            */
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            //Тут можно добавить перезапись куки, см. ниже объяснение.
        }
    }
}

?>