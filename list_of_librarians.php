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
    <title>Cinema collection</title>
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
        </div>
    </nav>
</header>
<div class="mx-auto" style="width: 90%;">
    <div class="card mb-3" style="background-color: #DCDCDC; margin-top: 1rem;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="img/librarians_1.jpg" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body" style="text-align: center; padding: 3.25rem;">
                    <h1 class="card-title">Кристина Лебедева</h1>
                    <p class="font-italic" style="padding: 2rem;">Отвечает за наличие фильмов. Может подсказать вам какой фильм можно посмотреть по своему личному опыту. Разбирается в фильмах жанров романтики, драмы и похожее.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3" style="background-color: #DCDCDC">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body" style="text-align: center; padding: 3.25rem;">
                    <h1 class="card-title">Олег Ликинов</h1>
                    <p class="font-italic" style="padding: 2rem;">Хорошо разбирается в фильмах ужасов и мистики. Всегда поможет выбрать что-то подходящее вам.</p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="img/librarians_2.jpg" class="card-img">
            </div>
        </div>
    </div>
    <div class="card mb-3" style="background-color: #DCDCDC">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="img/librarians_3.jpg" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body" style="text-align: center; padding: 3.25rem;">
                    <h1 class="card-title">Анастасия Волкова</h1>
                    <p class="font-italic" style="padding: 2rem;">Прексно понимает знает много семейных и детских фильмов. Может подсказать любой фильм на ваш вкус к вашему вечерному семейному вечеру или подсказать мультфильм для ваших детей или детей знакомых.</p>
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
<!-- ./Footer -->
</html>