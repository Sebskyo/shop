<?php
include_once "../../../connect.php";
session_start();

if(isset($_SESSION["username"])) {
	$user = $_SESSION["username"];
	$sql = "SELECT isAdmin FROM user WHERE username='$user'";
	$result = mysqli_query($GLOBALS["conn"], $sql);
	$isAdmin;
	if($result)
		$isAdmin = mysqli_fetch_assoc($result)["isAdmin"];
	if($isAdmin == 1) {
		echo "
		<form method='post' enctype='multipart/form-data'>
			Title:<br/>
			<input name='title' type='text'/><br/>
			Description:<br/>
			<textarea name='description' cols='70' rows='6'></textarea><br/>
			Image:<br/>
			<input name='image' type='file'><br/>
			Price:<br/>
			<input name='price' type='number'><br/>
			<button type='submit'> CREATE </button>
		</form>
		";

		if( isset($_REQUEST["title"]) && isset($_REQUEST["description"]) &&
			isset($_FILES["image"])) {

			$isValid = false;

			// Image upload
			$fileType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
			$fileName = time() . "." . $fileType;
			$targetFile = "../../../image/" . $fileName;
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			$isImage = $check !== false ? true : false;
			if( !$isImage || $_FILES["image"]["size"] > 100000 ||
				($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") ||
				file_exists($targetFile)) {

				echo "Error";
			}
			else {
				if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
					echo "image uploaded";
					$isValid = true;
				}
				else
					echo "error";
			}

			// Database
			if($isValid) {
				$title = mysqli_real_escape_string($GLOBALS["conn"], $_REQUEST["title"]);
				$description = mysqli_real_escape_string($GLOBALS["conn"], $_REQUEST["description"]);
				$price = $_REQUEST["price"];
				$sql = "INSERT INTO item (title, description, image, price)
					VALUES ('$title', '$description', '$fileName', '$price');";
				$result = mysqli_query($GLOBALS["conn"], $sql);
			}
		}
	}
	else
		echo "Error: You are not an admin";
}
else
	echo "Error: Not logged in";

closeConnection();