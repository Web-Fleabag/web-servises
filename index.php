
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    setcookie('username', '', time()); //удаляем логин
    setcookie('key', '', time()); //удаляем ключ
    header("location: login.php");
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
    <title>Home</title>
  </head>
  <body>
  <div class="content">
      <!-- notification message -->
      <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
              <h3>
                  <?php
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                  ?>
              </h3>
          </div>
      <?php endif ?>

       <!-- logged in user information -->
       <?php  if (isset($_SESSION['username'])) : ?>

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
                                   <a class="dropdown-item" href="#">List of librarians</a>
                                   <a class="dropdown-item" href="list_of_clients.html">List of clients</a>
                                   <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="#">Film issuance register</a>
                               </div>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link disabled" href="#">Disabled</a>
                           </li>
                       </ul>
                       <span class="navbar-text">
      Welcome back, <?php echo $_SESSION['username']; ?>
          <a class="btn my-2 my-sm-0" type="submit" href="my_page.php">Личный кабинет</a>
          <a href="index.php?logout='1'">logout</a>
    </span>

                   </div>
               </nav>
           </header>

           <div class="container-fluid1">
               <div class="margin-item">
                   <h1 class="display-1 ">Cinema collection</h1>
                   <button type="button" class="btn btn-lg " style="background-color: #f7c94a; margin-left: 25%;"><b><a href="collection_post.php">Start now</a></b></button>
               </div>

           </div>

           <div class="jumbotron jumbotron-fluid Desc">
               <div class="container-fluid" style="font-family: 'Kumbh Sans', sans-serif; color: white;">
                   <div class="row row1">
                       <div class="col-sm">
                           <img src="./img/test1.jpg" class="rounded float-left imgDesc " alt="DescriptionImg">
                       </div>
                       <div class="col-sm-6">
                           <h1 class="display-4 title1">Something very important</h1>
                           <p class="lead"> Information about what a great service we have and boolshit about you will not find anything better than this! </p>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-6">
                           <h1 class="display-4 title1">Something very important</h1>
                           <p class="lead">Information about what a great service we have and nonsense that you will not find anything better than this!</p>
                       </div>
                       <div class="col-sm">
                           <img src="./img/test2.jpg" class="rounded float-right imgDesc " alt="DescriptionImg">
                       </div>
                   </div>
               </div>
           </div>

           <!-- Optional JavaScript -->
           <!-- jQuery first, then Popper.js, then Bootstrap JS -->
           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



       <?php endif ?>
   </div>
  </body>
</html>