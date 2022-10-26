<?php
	include 'config.php';
	$id=$_POST['id'];
	$theme=$_POST['theme'];
	$sql = "UPDATE `user_form`
	SET `theme`='$theme',
	WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>