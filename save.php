<?php
require_once "config.php";
$sql = "UPDATE info SET banner='".$_POST['banner']."',info='".$_POST['info']."' WHERE email LIKE '".$_POST["email"]."'";
$result = $conn->query($sql);
echo json_encode($result);
?>