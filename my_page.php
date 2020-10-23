<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <title>My page</title>
</head>
<body>

    <div class="error success" >
        <h3>

        </h3>
    </div>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">  <img src="./img/logo2.jpg" class="logo"  alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="collection_post.php">Collection</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        List
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="list_of_librarians.html">List of librarians</a>
                        <a class="dropdown-item" href="list_of_clients.html">List of clients</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="film_issuance_register.html">Film issuance register</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
    <?php
                        require_once 'server.php';
                        $db = mysqli_connect('localhost', 'root', '', 'registration');
                        $result = mysqli_query($db,"SELECT username,email,fullName,number FROM users WHERE username='$_SESSION[username]'"); ?>

<div class="mx-auto" style="width: 90%;">
    <div class="card mb-3" style="background-color: #DCDCDC; margin-top: 1rem;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="https://trikky.ru/wp-content/blogs.dir/1/files/2019/07/17/images-1-1.jpg" alt="" class="round">
            </div>
            <div class="col-md-8">
                <div class="card-body" style="text-align: center; padding: 3.25rem;">
                    <h1 class="card-title">Welcome, <?php echo $_SESSION['username']; ?></h1>
                    <p class="font-normal" style="padding: 2rem;">Личные данные</p>
                    <div class="form-group">
                        <?php
                        if(mysqli_num_rows($result) > 0 ){
                            while ($row = mysqli_fetch_array ($result)) {
                              echo "<p> Username:</p> " .$row['username']. "<p> Full Name:</p> ".$row['fullName']. "<p> Number:</p> ".$row['number']. "<p> Email:</p> ".$row['email']. "<br />";

                            }
                        }
                        ?>
                    </div>
                    <a href="#" class="btn btn-lg btnSign">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p> Cinema collection </p>
                <p class="h6">© All right Reversed.</p>
            </div>
            <hr>
        </div>
    </div>
</section>
</body>
</html>

