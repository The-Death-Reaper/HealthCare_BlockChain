<? php
	$patientName = $DoB = $OrganDonor = $Organ = $BloodPressure = $GlucoseLevel = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$patientName = test_input($_POST["patientName"]);
		$DoB = test_input($_POST["DoB"]);
		$OrganDonor = test_input($_POST["OrganDonor"]);
		$Organ = test_input($_POST["Organ"]);
		$BloodPressure = test_input($_POST["BloodPressure"]);
		$GlucoseLevel = test_input($_POST["GlucoseLevel"]);

	}
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	$GenerateKeyCommand = escapeshellcmd('python3 generateKeys.py');
	$keys = shell_exec($GenerateKeyCommand);
	$keys = explode("|", $keys);
	$publicKeyE = $keys[1];
	$publicKeyN = $keys[0];
	$privateKey = $keys[2];


	$EncryptCommand = escapeshellcmd('python3 EncryptMessage.py $publicKeyN $publicKeyE $patientName $DoB $OrganDonor');
	$EncryptMessage = shell_exec($EncryptCommand);
	$EncryptMessage = explode("|",$EncryptMessage);
	
?>