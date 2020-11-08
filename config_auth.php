<?php

/* Attempt to connect to MySQL database */
$db = mysqli_connect('localhost', 'root', '', 'registration');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


