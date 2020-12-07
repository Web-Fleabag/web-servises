<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $name_error = "";
$description = $description_error = "";
$genre = $genre_error = "";
$duration  = $duration_error = "";
$producer = $producer_error = "";
$cast = $cast_error = "";
$age_rating = $age_rating_error = "";
$price = $price_error = "";
$image = $image_error = "";
$available = $available_error = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    /// Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_error = "Name is required";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_error = "You are using the wrong characters";
    } else{
        $name = $input_name;
    }

    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_error = "Please, enter the description";
    } else{
        $description = $input_description;
    }

    // Validate genre
    $input_genre = trim($_POST["genre"]);
    if(empty($input_genre)){
        $genre_error = "Please, enter the genre";
    } else{
        $genre = $input_genre;
    }

    // Validate duration
    $input_duration = trim($_POST["duration"]);
    if(empty($input_duration)) {
        $duration_error = "Please enter the duration of the film";
    }
    else{
        $duration = $input_duration;
    }
    // Validate producer
    $input_producer = trim($_POST["producer"]);
    if(empty($input_producer)) {
        $producer_error = "Please enter the producer of this film";
    }
    else{
        $producer = $input_producer;
    }
// Validate cast
//    $input_producer = trim($_POST["cast"]);
//    if(empty($input_cast)) {
//        $cast_error = "Please enter the cast of this film";
//    }
//    else{
//        $cast = $input_cast;
//    }

    // Validate age rating
    $input_age_rating = trim($_POST["age_rating"]);
    if(empty($input_age_rating)) {
        $age_rating_error = "Please enter the age rating";
    }
    else{
        $age_rating = $input_age_rating;
    }

    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)) {
        $price_error= "Please, enter the price";
    }
    else{
        $price = $input_price;
    }

    // Validate available
    $input_available = trim($_POST["available"]);
    if(empty($input_available)) {
        $input_available = 1;
    }
    else if(ctype_digit(strval($available))){
        $available_error= "Please, use the correct characters";
    }
    else{
        $available = $input_available;
    }

    // Check input errors before inserting in database
    if(empty($name_error) && empty($description_error) && empty($genre_error)&& empty($duration_error)&& empty($producer_error)&& empty($cast_error)&& empty($age_rating_error)&& empty($price_error)&& empty($available_error)){
        // Prepare an insert statement
        $sql = "UPDATE products SET name=?, description=?, genre=?, duration=?, producer=?, cast=?, age_rating=?, price=?, image=?, available=? WHERE id=? ";

        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssii", $param_name, $param_description, $param_genre, $param_duration, $param_producer, $param_cast, $param_age_rating, $param_price, $param_image, $param_available,$param_id );

            // Set parameters
            $param_name = $name;
            $param_description = $description;
            $param_genre = $genre;
            $param_duration = $duration;
            $param_producer = $producer;
            $param_cast = $cast;
            $param_age_rating = $age_rating;
            $param_price = $price;
            $param_image = $image;
            $param_available = $available;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: film_issuance_register.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($db);
}
else{

    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE id = ?";
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2>Update Record</h2>
                </div>
                <p>Please edit the input values and submit to update the record.</p>
                <form class="validationForm" name="validationForm" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                        <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control name element"  id="name" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_error;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($description_error)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control element description"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_error;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($genre_error)) ? 'has-error' : ''; ?>">
                            <label>Genre</label>
                            <input type="text" name="genre" class="form-control element genre" value="<?php echo $genre; ?>">
                            <span class="help-block"><?php echo $genre_error;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($duration_error)) ? 'has-error' : ''; ?>">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control element duration" value="<?php echo $duration; ?>">
                            <span class="help-block"><?php echo $duration_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($producer_error)) ? 'has-error' : ''; ?>">
                            <label>Producer</label>
                            <input type="text" name="producer" class="form-control element producer" value="<?php echo $producer; ?>">
                            <span class="help-block"><?php echo $producer_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($cast_error)) ? 'has-error' : ''; ?>">
                            <label>Cast</label>
                            <textarea name="cast" class="form-control"><?php echo $cast; ?></textarea>
                            <span class="help-block"><?php echo $cast_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($age_rating_error)) ? 'has-error' : ''; ?>">
                            <label>Age rating</label>
                            <input type="text" name="age_rating" class="form-control element rating age_rating" value="<?php echo $age_rating; ?>">
                            <span class="help-block"><?php echo $age_rating_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_error)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control price element int" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($image_error)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($available_error)) ? 'has-error' : ''; ?>">
                            <label>Available</label>
                            <input type="text" name="available" class="form-control available element int" value="<?php echo $available; ?>">
                            <span class="help-block"><?php echo $available_error;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="validationCheck"  name="validationCheck" id="validationCheck" value="Submit">
                    <a href="film_issuance_register.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/validation_form.js"></script>
</body>
</html>