
<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
};

$select = mysqli_query($conn, "SELECT * FROM user_form WHERE id='" . $_SESSION['id'] . "'");

$resultTheme = mysqli_fetch_array($theme);

?>
