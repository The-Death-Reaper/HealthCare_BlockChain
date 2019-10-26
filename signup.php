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

	$conn = mysqli_connect("loginid","password","SecretKey","PublicKeyN","PublicKeyE","myDB");
	// $conn = new mysqli($LoginId,$Password,$SecretKey,$PublicKeyN,$PublicKeyE);
	if($conn->connect_error){
		die("Connection Failed");
	}
	// $sql = "CREATE DATABASE myDB (
	// loginid VARCHAR(30) NOT NULL,
	// password VARCHAR(30) NOT NULL
	// SecretKey INT(16),
	// PublicKeyN INT(16),
	// PublicKeyE INT(16)
	// )";
	$sql = "INSERT INTO myDB (loginid,password,SecretKey,PublicKeyN,PublicKeyN)
	Values
	('$LoginId','$Password','$SecretKey','$PublicKeyN',$PublicKeyE')";

	if($conn->query($sql) === TRUE){
		echo "New Record Created";
	}
	$conn->close();
?>