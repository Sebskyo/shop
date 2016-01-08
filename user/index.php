<?php
include_once "../navbar.php";
if (isset($_SESSION["username"])) {
	echo "<a href='checkout'>lolz</a>";
}
else {
	header("location:..");
}