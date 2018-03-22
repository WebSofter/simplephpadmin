<?php
require_once "config.php";
$sql = "SELECT * FROM info WHERE email LIKE '".$_POST["email"]."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//if ($result->num_rows > 0) {
//	$row = $result->fetch_assoc();
//}

echo json_encode($row);
?>