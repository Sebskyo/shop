<?php
include_once "../../connect.php";
include_once "../../navbar.php";
session_start();
if(isset($_SESSION["username"])) {
	$user = $_SESSION["username"];
	$invoice = $_REQUEST["invoiceID"];
	$sql = "SELECT * FROM order INNER JOIN item WHERE invoiceID = '$invoice'";
	$result = mysqli_query($GLOBALS["conn"], $sql);
	while($result) {
		$info = mysqli_fetch_assoc($result);
		echo $info["title"] . " x" . $info["amount"] . " for " . $info["price"] . " each.<br/>";
	}
}