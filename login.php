<?php	
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$LoginId = test_input($_POST["LoginId"]);
		$Password = test_input($_POST["password"]);
	}
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$conn = new mysqli($LoginId,$Password,$SecretKey,$PublicKey);
	if($conn->connect_error){
		die("Connection Failed");
	}
?>