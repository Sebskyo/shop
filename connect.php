<?php
ini_set("display_errors", 1);

$host = "localhost";
$user = "root";
$pass = "testo";
$db = "shop";
$GLOBALS['conn'] = null;

// Establishes connection
$GLOBALS['conn']  = mysqli_connect($host, $user, $pass, $db);
if(!$GLOBALS['conn']) {
	die("ud gone did done fuck'd up: " . mysqli_connect_error());
}

// Closes connection
function closeConnection() {
	mysqli_close($GLOBALS['conn'] );
}