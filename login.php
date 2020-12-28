<?php include('server.php') ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <title>Sign In</title>
</head>
<body>
<?php
if (!empty($_POST)) {
    header('location:index.php');
}
?>
<div class="container" style="text-align: center; background-color: white; width: 35%; margin-top:7vh;border-radius: 5%; ">
    <div class="marginal"> <h2>Sign In</h2></div>
    <hr>
    <form class="formIn" method="post" action="login.php" autocomplete='off';>
        <?php include('errors.php'); ?>

        <div class="form-group ">
            <label for="InputData">Input your name</label>
            <input type="text" class="form-control" id="username" aria-describedby="dataHelp" placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password">
        </div>
        <button type="submit" class="btn marginal" style="background-color: #f7c94a" name="login_user">Submit</button>
        <p><a href="registration.php">Зарегистрироваться</a></p>
    </form>
    <?php require_once "loginGoogle.php"?>
</div>

</body>
</html>
