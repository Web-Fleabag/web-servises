
<?php require_once 'configEnter.php';?>
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
    <title>Cinema collection</title>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
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
        <h2 class="display-5" style="text-align: center; font-family: 'Kumbh Sans', sans-serif;">Film issuance register</h2>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix" style="margin-left: 80%; margin-bottom: 1rem;">
                            <a href="create_record.php" class="btn" style="background-color: #f7c94a;">Add New Record</a>
                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";

                        // Attempt select query execution
                        $sql= "SELECT * FROM products";
                        if($result = mysqli_query($db, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table table-bordered table-striped' >";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Name</th>";
                                echo "<th>Description</th>";
                                echo "<th>Genre</th>";
                                echo "<th>Duration</th>";
                                echo "<th>Producer</th>";
                                echo "<th>Cast</th>";
                                echo "<th>Age rating</th>";
                                echo "<th>Price</th>";
                                echo "<th>Image</th>";
                                echo "<th>Available</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td><a href='review_show.php?id=". $row['id'] ."' title='View Review' data-toggle='tooltip'> ". $row['name'] . "</a></td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['genre'] . "</td>";
                                    echo "<td>" . $row['duration'] . "</td>";
                                    echo "<td>" . $row['producer'] . "</td>";
                                    echo "<td>" . $row['cast'] . "</td>";
                                    echo "<td>" . $row['age_rating'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['image'] . "</td>";
                                    echo "<td>" . $row['available'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='read_record.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'> Read </a>";
                                    echo "<a href='update_record.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'> Update </a>";
                                    echo "<a href='delete_record.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'> Delete </a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                        }

                        // Close connection
                        mysqli_close($db);
                        ?>
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


