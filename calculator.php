<?php
require_once 'calculator_server.php';
?>
<!DOCTYPE HTML>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_calculator.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
</head>

<body>
<div class="class1">
<a href="my_page.php" class="btn btn-lg"><h2>Back to the future</h2></a>
<h1>Cinema calculator</h1>
<form action='' method='post' class="calculate-form">
    <input type="text" name="number1" class="numbers" placeholder="Первое число">
    <select class="operations" name="action">
        <option value='plus'>+</option>
        <option value='minus'>-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="text" name="number2" class="numbers" placeholder="Второе число">

    <input class="submit_form" type="submit" name="submit" value="Получить ответ">
</div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
