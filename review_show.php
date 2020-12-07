<?php require_once 'configEnter.php';
require_once "config.php";

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Prepare a select statement
    $sql = "SELECT * FROM reviews WHERE film_id = ?";

    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) >= 1){

                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $username = $row["username"];
                $rating = $row["rating"];
                $review = $row["review"];
                $film_id = $row["film_id"];
                if(mysqli_stmt_execute($stmt))
                    $result = mysqli_stmt_get_result($stmt);
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($db);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
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
    <link rel='stylesheet' href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <title>Review</title>
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

<div class="container-fluid marginal" style='background-color: white; width: 100%; '>
    <div id="myDIV ">
        <h3 class="display-5" style="text-align: center; font-family: 'Kumbh Sans', sans-serif;"> Reviews for the film: </h3>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix" style="margin-left: 80%; margin-bottom: 1rem;">

                            <form action="create_review.php" method="get">
                                <input type="hidden" name="film_id" value="<?php echo $row["film_id"]; ?>">
                                <button class="btn btn-success btn-block">Добавить новую запись</button>
                            </form>
                        </div>
                        <?php
                                echo "<table class='table table-bordered table-striped' >";
                                echo "<thead>";
                                echo "<tr>";

                           //     echo "<th>Username</th>";
                                echo "<th># </th>";
                                echo "<th>Rating</th>";
                                echo "<th>Review</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                              //  foreach($row as $value){
                                    echo "<tr>";
                                   // echo "<td>".$value."</td>";
                                  //  echo "<td>" . $row['username'] . "</td>";
                                    echo "<th>".$row['id']."</th>";
                                    echo "<td>" . $row['rating'] . "</td>";
                                    echo "<td>" . $row['review'] . "</td>";
                                    echo "<td>";
                                   // echo"<form action='update_review.php' method='get'> <input type='hidden' name='film_id' value='".$row['film_id']."'><input type='hidden' name='id' value='".$row['id']."'><button class='btn btn-success'>Update</button></form>";
                                    echo "<a href='update_review.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'> Update  </a>";
                                    echo "<a href='delete_review.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'> Delete </a>";
                                    echo "</td>";
                                    echo "</tr>";


                                }

                                echo "</tbody>";
                                echo "</table>";


                        ?>
<!--                        <div class="form-group">-->
<!--                            <label>Username</label>-->
<!--                            <p class="form-control-static">--><?php //echo $row["username"]; ?><!--</p>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label>Rating</label>-->
<!--                            <p class="form-control-static">--><?php //echo $row["rating"]; ?><!--</p>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label>Review</label>-->
<!--                            <p class="form-control-static">--><?php //echo $row["review"]; ?><!--</p>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

</body>
</html>
