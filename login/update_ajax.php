<?php
include 'config.php';

$id= $_POST['id'];
$theme= $_POST['theme'];

$sql = "UPDATE user_form
SET theme='$theme'
WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
