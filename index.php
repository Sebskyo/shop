<?php
include_once "connect.php";
session_start();
if(isset($_SESSION["username"]))
	echo "<a href='user'>you</a> | <a href='logout'>logout</a>";
else
	echo "<a href='login'>login</a> | <a href='signup'>sign up</a>";


closeConnection();