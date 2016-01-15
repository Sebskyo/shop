<?php
include_once "../../connect.php";
include_once "../../navbar.php";
session_start();
if(isset($_SESSION["username"])) {
	$user = $_SESSION["username"];
	$userID;
	$sql = "SELECT userID FROM user WHERE username = '$user'";
	$result = mysqli_query($GLOBALS["conn"], $sql);
	if($result) {
		$info = mysqli_fetch_assoc($result);
		$userID = $info["userID"];
	}

	$sql = "SELECT * FROM invoice WHERE userID = '$userID'";
	$result = mysqli_query($GLOBALS["conn"], $sql);
	while($result) {
		$info = mysqli_fetch_assoc($result);
		echo "
		Purchase made: ".$info["date"]." <a href='invoice/?invoiceID=".$info["invoiceID"]."'>view</a><br/>
		";
	}
}