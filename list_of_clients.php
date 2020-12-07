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
    <link href="add_row.js">
    <title>List of client</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="html/index.html">  <img src="./img/logo2.jpg" class="logo" alt=""></a>
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
                    <a class="nav-link dropdown-toggle" href="html/collection.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="container marginal" style='background-color: white;'>
    <div id="myDIV ">
        <h2 class="display-5" style="text-align: center; font-family: 'Kumbh Sans', sans-serif;">List of the clients</h2>
    </div>
    <table id="myTable" class="table table-hover ">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Client name</th>
            <th scope="col">Phone number</th>
            <th scope="col">Last request</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        <tr>
            <th scope="row">5</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        <tr>
            <th scope="row">6</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        <tr>
            <th scope="row">7</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
</div>

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
</body>
</html>