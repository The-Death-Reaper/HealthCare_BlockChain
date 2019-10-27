<?php
	$patientName = $DoB = $OrganDonor = $Organ = $BloodPressure = $GlucoseLevel = $PhoneNumber = $BloodType = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$patientName = test_input($_POST["p_name"]);
		$DoB = test_input($_POST["DoB"]);
		$OrganDonor = test_input($_POST["OrganDonor"]);
		$Organ = test_input($_POST["Organ"]);
		$PhoneNumber = test_input($_POST["number"]);
		$BloodType = test_input($_POST["b_type"]);
		//$BloodPressure = test_input($_POST["BloodPressure"]);
		//$GlucoseLevel = test_input($_POST["GlucoseLevel"]);
		$file = "NotEncrypted.txt";
	$current = file_get_contents("NotEncrypted.txt");
	$txt = $patientName.' '.$DoB.' '.$PhoneNumber.' '.$Organ;
	$current.=$txt;
	file_put_contents($file, $txt);

	}
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$keys = array(45312,2,67328);
	// $GenerateKeyCommand = escapeshellcmd('python generateKeys.py');
	// $keys = `python generateKeys.py`;
	// echo $keys;

	// $keys = explode("|", $keys);

	// $arr = array_keys($keys);
	$publicKeyE = $keys[1];
	$publicKeyN = $keys[0];
	$privateKey = $keys[2];
	// echo $publicKeyN;
	// print_r($keys);

	// $EncryptCommand = escapeshellcmd('python EncryptMessage.py $publicKeyN $publicKeyE $patientName $DoB $OrganDonor');
	// $EncryptMessage = `python EncryptMessage.py $publicKeyN $publicKeyE $patientName $DoB $OrganDonor`;
	// $EncryptMessage = shell_exec($EncryptCommand);
	// echo $EncryptMessage;
	$file = "NotEncrypted.txt";
	$current = file_get_contents("NotEncrypted.txt");
	$txt = $patientName.' '.$DoB.' '.$PhoneNumber;
	$current.=$txt;
	file_put_contents($file, $txt);

	header("http://localhost/HashCode/index.html/");

    // echo "HELLO IM A BEAST";

?>
