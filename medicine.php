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
	$keys = explode(" ", $keys);
	$privateKey = $keys[1];
	$publicKey = $keys[0];


	$EncryptCommand = escapeshellcmd('python3 EncryptMessage.py $publicKey $patientName $DoB $OrganDonor')
?>