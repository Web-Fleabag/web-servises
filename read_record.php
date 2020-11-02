<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM products WHERE id = ?";

    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value

                $name = $row["name"];
                $description = $row["description"];
                $genre = $row["genre"];
                $duration  = $row["duration"];
                $producer = $row["producer"];
                $cast = $row["cast"];
                $age_rating = $row["age_rating"];
                $price = $row["price"];
                $image = $row["image"];
                $available = $row["available"];

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1> More about </h1>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <p class="form-control-static"><?php echo $row["name"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <p class="form-control-static"><?php echo $row["description"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <p class="form-control-static"><?php echo $row["genre"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Duration</label>
                    <p class="form-control-static"><?php echo $row["duration"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Producer</label>
                    <p class="form-control-static"><?php echo $row["producer"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Cast</label>
                    <p class="form-control-static"><?php echo $row["cast"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Age rating</label>
                    <p class="form-control-static"><?php echo $row["age_rating"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <p class="form-control-static"><?php echo $row["price"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <p class="form-control-static"><?php echo $row["image"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Available</label>
                    <p class="form-control-static"><?php echo $row["available"]; ?></p>
                </div>
                <p><a href="film_issuance_register.php" class="btn btn-primary">Back</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>