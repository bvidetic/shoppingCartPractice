<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');


	$error_array = array();
	$error_string = "";
	$first_name = "";
	$last_name = "";
	$email = "";	
	$cc_number = "";
	$address = "";
	$city = "";
	$state = "";
	$zip = "";
	$phone = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// FIRST NAME----------------------------------------------------------------------------
		if(strlen($_POST['first_name']) < 3) {
			array_push($error_array, 'Please enter a first name, at least 3 letters');
		}else{
			$first_name = $_POST['first_name'];
		}
		// LAST NAME----------------------------------------------------------------------------
		if(strlen($_POST['last_name']) < 3) {
			array_push($error_array, 'Please enter a last name at least 3 letters');
		}else{
			$last_name = $_POST['last_name'];	
		}

	
//EXPRESSION CODE FOR CITY, STATE & ZIP
		// PREG_MATCH()
		// ^([a-zA-Z-._+\d@]*)$	
		// EMAIL ADDRESS-------------------------------------------------------------------------
		if($_POST['email'] == '') {
			array_push($error_array, 'Please enter a email address');
		}else{
			$e = $_POST['email'];
			$pos = strpos ($e, '@');
			if($pos === false) {
				array_push($error_array, 'Email address must have \'@\'');
			}else{
				if(substr($e, -4) != '.com'){
					array_push($error_array, "email must end with '.com'");
				}else{
					$email = $e;
				}
			}
		}


		// CC NUMBER----------------------------------------------------------------------------
		if(strlen($_POST['cc_number']) < 16) {
			array_push($error_array, 'Please enter a valid credit card number');
		}else{
			$cc_number = $_POST['cc_number'];	
		}

		// $ccdigits = array('');
		// foreach ($ccdigits as $goodmoney){
		// 	if (ctype_digit(!$goodmoney)){
		// 		array_push($error_array, 'Please enter a valid credit card number');
		// 	}else{
		// 		echo"not a number";
		// 	}
		// }

		// ADDRESS----------------------------------------------------------------------------
		if(strlen($_POST['address']) < 3) {
			array_push($error_array, 'Please enter your address, 3 letters');
		}else{
			$address = $_POST['address'];
		}

		// 	CITY---------------------------------------------------------------------------------
		if(strlen($_POST['city']) < 3) {
			array_push($error_array, 'Please enter your city, 3 letters');
		}else{
			$city = $_POST['city'];
		}




//EXPRESSION CODE FOR CITY, STATE & ZIP
		// PREG_MATCH()
		//   /^([a-zA-Z\s.]*),\s([a-zA-Z\s.]+)\s(\d{5}(-\d{4})*)$/GM

		// STATE----------------------------------------------------------------------------
		if(strlen($_POST['state']) < 2) {
			array_push($error_array, 'Please enter your state, 2 letters');
		}else{
			$state = $_POST['state'];
		}


		// ZIP----------------------------------------------------------------------------
		if(strlen($_POST['zip']) < 5) {
			array_push($error_array, 'Please enter your zip, 5 numbers');
		}else{
			$zip = $_POST['zip'];
		}


		// PHONE----------------------------------------------------------------------------
		if(strlen($_POST['phone']) > 10) {
			array_push($error_array, 'Please enter your phone, 10 numbers');
		}else{
			$phone = $_POST['phone'];
		}
		if(count($error_array) > 0) {
			foreach($error_array as $e) {
				$error_string = $error_string . $e . "<br>"; 
			}
		} else {header("Location: success.html");
		exit;
		}
	}
?>



<!-- <html lang="en">
<head>
	<title>Hello PHP Forms</title>
	<style>
	.error{
		color: red
	}
	</style>
</head>
<body>
	<div class="error"><?php echo($error_string); ?></div>
	<form action="" method="POST">
		FName: <input type="text" name="first_name" value="<?php echo $first_name?>">
		LName: <input type="text" name="last_name" value="<?php echo $last_name?>"><br>
		Address: <input type="text" name="address"value="<?php echo $address?>"><br>
		City: <input type="text" name="city"value="<?php echo $city?>">
		State: <input type="text" name="state"value="<?php echo $state?>">
		Zip: <input type="text" name="zip"value="<?php echo $zip?>"><br>
		Email: <input type="text" name="email"value="<?php echo $email?>"><br>
		Phone: <input type="text" name="phone"value="<?php echo $phone?>"><br>
		CC_Number: <input type="number" name="cc_number"value="<?php echo $cc_number?>"><br>
		<button type="submit">Let's Go!</button>
	</form>
</body>
</html> -->