<?php
include_once "../navbar.php";
if (isset($_SESSION["username"])) {
	echo "
	<a href='checkout'>view cart</a>
	<a href='invoices'>view invoices</a>
	";
}
else {
	header("location:..");
}