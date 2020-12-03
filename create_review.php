<?php
// Include config file
require_once "config.php";
$rating = $rating_error = "";
$review = $review_error = "";
$film_id = "";

if(isset($_POST["film_id"]) && !empty(trim($_POST["film_id"]))) {

// Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        $input_rating = trim($_POST["rating"]);
        if (empty($input_rating)) {
            $rating_error = "rating is required";
        } else {
            $rating = $input_rating;
        }

        // Validate description
        $input_review = trim($_POST["review"]);
        if (empty($input_review)) {
            $review_error = "Please, enter the description";
        } else {
            $review = $input_review;
        }

        $film_id = $_POST["film_id"];
        // Check input errors before inserting in database
        if (empty($rating_error) && empty($review_error)) {
            // Prepare an insert statement
            $sql = "INSERT INTO reviews (rating, review, film_id) VALUES (?,?,?)";

            if ($stmt = mysqli_prepare($db, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_rating, $param_review, $param_filmId);

                // Set parameters
                $param_rating = $rating;
                $param_review = $review;
                $param_filmId = $film_id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Records created successfully. Redirect to landing page
                    header("location: film_issuance_register.php");
                    exit();
                } else {
                    echo "Mistake! Please try again later.";
                }
                }
            mysqli_stmt_close($stmt);
            }

            // Close statement

        }

        // Close connection
        mysqli_close($db);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
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
                    <h2>Create Record</h2>
                </div>
                <p>Please fill this form and submit to add new film record to the database.</p>
                <form class="validationForm" id="validationForm" name="validationForm"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="text" name="rating" class="form-control rating element" id="rating" value="<?php echo $rating; ?>">
                        <span class="help-block"><?php echo $rating_error;?></span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="review" class="form-control element review " id="review" value="<?php echo $review; ?>"></textarea>

                        <span class="help-block"><?php echo $review_error;?></span>
                    </div>
                    <input type="hidden" name="film_id" class="form-control" value= " <?php echo $_GET['film_id'] ?>">
                    <input type="submit" class="validationCheck"  name="validationCheck" id="validationCheck" value="Submit">
                    <a href="film_issuance_register.php" class="btn btn-default">Cancel</a>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--<script src="js/validation_form.js"></script>-->
</body>
</html>