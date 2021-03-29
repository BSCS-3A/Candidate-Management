<?php
	include 'connect.php';
	$position_name=$_POST['position_name'];
	$position_description=$_POST['position_description'];
	
	$sql = "INSERT INTO `candidate_position`( `position_name`, `position_description`) 
	VALUES ('$position_name','$position_description')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>