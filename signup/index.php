<?php
include_once "../connect.php";
echo "
<form method='post'>
	Username:<br/>
	<input name='username' type='text'/><br/>
	Password:<br/>
	<input name='password' type='password'/><br/>
	First name:<br/>
	<input name='firstName' type='text'/><br/>
	Last name:<br/>
	<input name='lastName' type='text'/><br/>
	Address:<br/>
	<input name='address' type='text'/><br/>
	Zip code:<br/>
	<input name='zip' type='number'/><br/>
	<button type='submit'> SIGN UP </button>
</form>
";

if( isset($_REQUEST["username"]) && isset($_REQUEST["password"]) &&
	isset($_REQUEST["firstName"]) && isset($_REQUEST["lastName"]) &&
	isset($_REQUEST["address"]) && isset($_REQUEST["zip"])) {

	$username = $_REQUEST["username"];
	$password = password_hash($_REQUEST["password"], PASSWORD_BCRYPT);
	$firstName = $_REQUEST["firstName"];
	$lastName = $_REQUEST["lastName"];
	$address = $_REQUEST["address"];
	$zip = $_REQUEST["zip"];

	$sql = "INSERT INTO user (username, password, firstName, lastName, address, zip)
			VALUES ('$username', '$password', '$firstName', '$lastName', '$address', '$zip');";
	$result = mysqli_query($GLOBALS["conn"], $sql);
}

closeConnection();