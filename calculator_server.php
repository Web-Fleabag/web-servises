<?php
if (isset($_POST['submit'])) {

    $number1 = "";
    $number2 = "";
    $action = "";
    $result = "";

    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $action = $_POST['action'];

    // Валидация

   if( !$action || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0'))
    {
        $error_result = "Вы что-то не ввели!";
    }
    else
        {
        if (!is_numeric($number1) || !is_numeric($number2))
        {
            $error_result = "Цифры! Цифры! Цифры! ";
        }
        else
            switch ($action)
            {
                case 'plus':
                    $result = $number1 + $number2;
                    break;
                case 'minus':
                    $result = $number1 - $number2;
                    break;
                case 'multiply':
                    $result = $number1 * $number2;
                    break;
                case 'divide':
                    if ($number2 == '0')
                        $error_result = "Поскольку калькулятор арифметический, деление на 0 мы не производим, даже если захочется!";
                    else
                        $result = $number1 / $number2;
                    break;
            }
    }

    if (isset($error_result))
    {
        echo "<div class='error_output'> <h2>Ошибка:</h2> $error_result</div>";
    } else
        {
        echo "<div class='answer_output'>Ответ: $result</div>";
    }
}
