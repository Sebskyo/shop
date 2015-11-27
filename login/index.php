<?php
include_once "../connect.php";
session_start();
echo "
<form method='post'>
	Username:<br/>
	<input name='username' type='text'/><br/>
	Password:<br/>
	<input name='password' type='password'><br/>
	<button type='submit'> LOGIN </button>
</form>
";

if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && !isset($_SESSION["username"])) {
	$user = $_REQUEST["username"];
	$passSent = $_REQUEST["password"]; // password sent by user
	$passStored;
	$result = mysqli_query($GLOBALS["conn"], "SELECT password FROM user WHERE username='$user'");
	if($result) {
		$info = mysqli_fetch_assoc($result);
		$passStored = $info["password"];
		if(password_verify($passSent, $passStored)) {
			$_SESSION["username"] = $user;
			header("location:../");
		}
	}
	else
		echo "du klam lol";
}
