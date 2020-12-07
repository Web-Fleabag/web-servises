<?php
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>