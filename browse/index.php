<?php
include_once "../connect.php";
include_once "../navbar.php";

$sql = "SELECT * FROM item";
$result = mysqli_query($GLOBALS["conn"], $sql);
if($result){
	while($info = mysqli_fetch_assoc($result)) {
		$id = $info["itemID"];
		$title = $info["title"];
		$description = $info["description"];
		$image = $info["image"];
		$price = $info["price"];

		echo "
		<div class='itemContainer'>
			<a href='item/?itemID=$id'><img src='../image/$image' width='200px'/></a><br/>
			$title<br/>
			\$ $price
		</div>
		<br/>
		";
	}
}