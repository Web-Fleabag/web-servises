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
        <title>My page</title>
    </head>
    <body>

    <div class="error success" >
        <h3>

        </h3>
    </div>

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
    <?php
    require_once 'server.php';
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    $result = mysqli_query($db,"SELECT id,username,email,fullName,number FROM users WHERE id='$_SESSION[id]'");
    $user = mysqli_fetch_assoc($result); ?>

    <div class="mx-auto" style="width: 90%;">
        <div class="card mb-3" style="background-color: #DCDCDC; margin-top: 1rem;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="https://trikky.ru/wp-content/blogs.dir/1/files/2019/07/17/images-1-1.jpg" alt="" class="round">
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="text-align: center; padding: 3.25rem;">
                        <h1 class="card-title">Welcome, <?php echo $user['username']; ?></h1>
                        <p class="font-normal" style="padding: 0.5rem;"><h3>Изменить личные данные</h3></p>
                        <form class="formIn" method="post" action="my_page_edit.php" autocomplete='off';>
                            <?php include('errors.php'); ?>
                            <div class="form-group ">
                                <label for="InputData">Input your new username </label>
                                <input type="text" class="form-control" placeholder="Username" name="new_username" >
                            </div>

                            <div class="form-group">
                                <label for="InputEmail1">Input your new email</label>
                                <input type="email" class="form-control" id="email" placeholder="email" name="new_email" >
                            </div>
                            <div class="form-group">
                                <label for="InputFullName">Input your new personal data </label>
                                <input type="text" class="form-control"  placeholder="Full name " name="new_fullName" >
                            </div>
                            <div class="form-group">
                                <label for="InputNumber">Input your new number </label>
                                <input type="text" class="form-control" placeholder="number " name="new_number" >
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Input your new password </label>
                                <input type="password" class="form-control"  placeholder="password" name="new_password">
                            </div>

                            <button type="submit" class="btn marginal" style="background-color: #f7c94a" name="edit">Save changes</button>

                        </form>
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


<?php
