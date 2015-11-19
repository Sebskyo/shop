<?php
include_once "../../connect.php";

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
		";
	}
}