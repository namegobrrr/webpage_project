<?php
include 'config.php';

$id= $_POST['id'];
$theme= $_POST['theme'];

$sql = "UPDATE user_form
SET theme='$theme',
WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
	echo "Success!";
}

$conn->close();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
