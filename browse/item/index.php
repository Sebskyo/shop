<?php
include_once "../../connect.php";
include_once "../../navbar.php";

if(isset($_REQUEST["itemID"])) {
	$itemID = $_REQUEST["itemID"];
	$sql = "SELECT * FROM item WHERE itemID='$itemID'";
	$result = mysqli_query($GLOBALS["conn"], $sql);
	if($result) {
		$info = mysqli_fetch_assoc($result);
		$title = $info["title"];
		$description = $info["description"];
		$image = $info["image"];
		$price = $info["price"];

		echo "
		<h1>".$title."</h1>
		<img src='../../image/".$image."'/><br/>
		".$price."<br/>
		<p>".$description."</p>

		<form method='post'>
			<input type='number' name='amount' value='1'/>
			<button type='submit'> ADD2CART </button>
		</form>
		";

		if(isset($_REQUEST["amount"]) && isset($_SESSION["username"])) {
			array_push($_SESSION["cart"], [(int)$itemID, (int)$_REQUEST["amount"]]);
			header("location:../../user/checkout/");
		}
	}
}