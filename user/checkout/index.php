<?php
include_once "../../connect.php";
include_once "../../navbar.php";

echo "
	<form method='post'>
		<button type='submit' name='checkout'>checkout</button>
	</form>
	<a href='../../browse'>continue shopping</a>
";

if(isset($_SESSION["username"])) {
	var_dump($_SESSION["cart"]);

	if(isset($_REQUEST["checkout"])) {
		date_default_timezone_set("UTC");
		$date = date("d/m/Y H:i:s");
		$user = $_SESSION["username"];
		$userID;
		$sql = "SELECT userID FROM user WHERE username='$user'";
		$result = mysqli_query($GLOBALS["conn"], $sql);
		if($result)
			$userID = mysqli_fetch_assoc($result)["userID"];

		$sql = "INSERT INTO invoice (date, userID) VALUES ('$date','$userID')";
		$result = mysqli_query($GLOBALS["conn"], $sql);
		$invoiceID = mysqli_insert_id($GLOBALS["conn"]);

		for($i = 0; $i < count($_SESSION["cart"]); $i++) {
			$itemID = (int) $_SESSION["cart"][$i][0];
			$amount = (int) $_SESSION["cart"][$i][1];
			$sql = "INSERT INTO order (invoiceID, itemID, amount) VALUES ('$invoiceID', '$itemID', '$amount')";
			$result = mysqli_query($GLOBALS["conn"], $sql);
		}

		$sql = "UPDATE invoice SET isPaid=TRUE WHERE invoiceID='$invoiceID'";
		$result = mysqli_query($GLOBALS["conn"], $sql);
		$_SESSION["cart"] = [];
	}
}