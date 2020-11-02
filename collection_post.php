<?php
session_start();

if (!isset($_SESSION['id'])) {
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
    <title>Collection</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">  <img src="./img/logo2.jpg" class="logo"  alt=""></a>
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
                        <a class="dropdown-item" href="list_of_librarians.php">List of librarians</a>
                        <a class="dropdown-item" href="list_of_clients.php">List of clients</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="film_issuance_register.php">Film issuance register</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <span class="navbar-text">
          <a class="btn my-2 my-sm-0" type="submit" href="my_page.php">Личный кабинет</a>
          <a href="index.php?logout='1'">logout</a>
    </span>
        </div>
    </nav>
</header>
<div class="container-fluid">
    <div class="row row1">
        <div class="col">
            <div class="card card1">
                <img src="./img/Lady_Bird_(film).jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card1" >
                <img src="./img/simpson_film.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card1" >
                <img src="./img/joker.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card1" >
                <img src="./img/movie.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row row1">
        <div class="col">
            <div class="card card1" >
                <img src="./img/joker.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card1">
                <img src="./img/Lady_Bird_(film).jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card1">
                <img src="./img/simpson_film.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card1">
                <img src="./img/card.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn centerBtn">Add to the Box</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript" src="functions.js"></script>
<!-- Footer -->
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p> Cinema collection  </p>
                <p class="h6">© All right Reversed.</p>
            </div>
            <hr>
        </div>
    </div>
</section>
<!-- ./Footer -->
</body>
</html>