<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$rating = $rating_error = "";
$review = $review_error = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {

    // $film_id  = $_POST["film_id"];
    $id = $_POST["id"];

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

        // Check input errors before inserting in database
        if (empty($rating_error) && empty($review_error)) {
            // Prepare an insert statement
            $sql = "UPDATE reviews SET rating=?, review=? WHERE id=?";

            if ($stmt = mysqli_prepare($db, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssi", $param_rating, $param_review, $param_id);

                // Set parameters
                $param_rating = $rating;
                $param_review = $review;
                $param_id = $id;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    $sql = "SELECT film_id FROM reviews WHERE id = $id";
                    if ($result = mysqli_query($db, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            $_GET["id"] =  $row['film_id'];
                        }
                    }
                    // Records created successfully. Redirect to landing page
                    require_once "review_show.php";

                    //header("location: review_show.php");
                    exit();
                } else {
                    echo "Mistake! Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($db);

    }
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM reviews WHERE id = ?";
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $rating = $row["rating"];
                    $review = $row["review"];
                    $film_id = $row["film_id"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($db);
    } else {
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
        .wrapper {
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
                <form class="validationForm" id="validationForm" name="validationForm"
                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($rating_error)) ? 'has-error' : ''; ?>">
                        <label>Rating</label>
                        <input type="text" name="rating" class="form-control rating element" id="rating"
                               value="<?php echo $rating; ?>">
                        <span class="help-block"><?php echo $rating_error; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($review_error)) ? 'has-error' : ''; ?>">
                        <label>Description</label>
                        <textarea name="review" class="form-control element review " id="review"
                                  value="<?php echo $review; ?>"></textarea>

                        <span class="help-block"><?php echo $review_error; ?></span>
                    </div>
                    <!--                    <input type="hidden" name="id" value="-->
                    <?php //echo trim($_POST["id"]); ?><!--"/>-->
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="validationCheck" name="validationCheck" id="validationCheck"
                           value="Submit">
                    <a href="film_issuance_register.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>