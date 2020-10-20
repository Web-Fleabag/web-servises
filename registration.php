<?php include('server.php') ?>
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
    <title>Sign Up</title>
  </head>
  <body>
      
      <div class="container" style="text-align: center; background-color: white; width: 35%; margin-top:7vh;border-radius: 5%; ">
            <div class="marginal"> <h2>Sign Up</h2></div>
             <hr>
               <form class="formIn" method="post" action="registration.php" autocomplete='off';>
               <!--    <?php include('errors.php'); ?> -->
              <div class="form-group ">
    <label for="InputData">Input your name</label>
    <input type="text" class="form-control" id="username" aria-describedby="dataHelp" placeholder="Username" name="username" value="<?php echo $username; ?>">
  </div>

  <div class="form-group">
    <label for="InputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" name="email" value="<?php echo $email; ?>">
  </div>
                   <div class="input-group">
                       <label>Password</label>
                       <input type="password" name="password_1">
                   </div>
                   <div class="input-group">
                       <label>Confirm password</label>
                       <input type="password" name="password_2">
                   </div>
  </div>
  <button type="submit" class="btn marginal" style="background-color: #f7c94a" name="reg_user">Submit</button>
</form>     
      </div>

      
    </body>
</html>